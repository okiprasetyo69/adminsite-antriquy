<?php

namespace Modules\Api\Http\Controllers;

use Modules\API\Http\Controllers\BaseApiController;

use DB;
use Str;

use App\User;

use Illuminate\Http\Request;
use Modules\API\Http\Controllers\QueryFilters\UserQueryFilter;
use Illuminate\Support\Facades\Auth;

class UserApiController extends BaseApiController
{

    public function find(Request $request)
    {
        $user_query_filter = new UserQueryFilter($request);

        if (Auth::user()->role_code == ADMIN_INSTANSI) {

            $query = User::select('sys_users.*', 'mst_instances.name as instance_name')
                ->join('mst_instances', 'sys_users.instance_id', '=', 'mst_instances.id')
                ->where('sys_users.role_code', STAFF_INSTANSI)
                ->where('sys_users.deleted', 0)
                ->where('sys_users.instance_id', Auth::user()->instance_id);
            $query_for_count = User::select('sys_users.*', 'mst_instances.name as instance_name')
                ->join('mst_instances', 'sys_users.instance_id', '=', 'mst_instances.id')
                ->where('sys_users.role_code', STAFF_INSTANSI)
                ->where('sys_users.deleted', 0)
                ->where('sys_users.instance_id', Auth::user()->instance_id);
        } else {

            $query = User::select('sys_users.*', 'mst_instances.name as instance_name')
                ->join('mst_instances', 'sys_users.instance_id', '=', 'mst_instances.id')
                ->where('sys_users.deleted', 0);
            $query_for_count = User::select('sys_users.*', 'mst_instances.name as instance_name')
                ->join('mst_instances', 'sys_users.instance_id', '=', 'mst_instances.id')
                ->where('sys_users.deleted', 0);
        }

        if ($user_query_filter->get_search_text() != null) {
            $query = $query->whereRaw("(fullname like '%{$user_query_filter->get_search_text()}%')")
                ->orWhereRaw("(mst_instances.name like '%{$user_query_filter->get_search_text()}%')")
                ->orWhereRaw("(sys_users.address like '%{$user_query_filter->get_search_text()}%')");
            $query_for_count = $query_for_count->whereRaw("(fullname like '%{$user_query_filter->get_search_text()}%')")
                ->orWhereRaw("(mst_instances.name like '%{$user_query_filter->get_search_text()}%')")
                ->orWhereRaw("(sys_users.address like '%{$user_query_filter->get_search_text()}%')");
        }

        if ($user_query_filter->get_id() != null) {
            $query = $query->where("id", $user_query_filter->get_id());
            $query_for_count = $query_for_count->where("id", $user_query_filter->get_id());
        }

        $results = $query->limit($user_query_filter->get_length())->offset($user_query_filter->get_start());

        $this->set_datatable_response($user_query_filter->get_draw(), $query_for_count->count(), $results->get());

        return $this->success_response_datatable();
    }

    public function detail(Request $request)
    {
        $user_query_filter = new UserQueryFilter($request);

        $query = User::select('sys_users.*', 'mst_instances.name as instance_name')
            ->leftJoin('mst_instances', 'sys_users.instance_id', '=', 'mst_instances.id')
            ->where('sys_users.deleted', 0);

        if ($user_query_filter->get_id() != null) {
            $query = $query->where("sys_users.id", $user_query_filter->get_id());
        }

        $results = $query->get();

        return $this->success_response($results);
    }

    public function delete(Request $request)
    {
        $user_query_filter = new UserQueryFilter($request);

        $query = User::where('sys_users.deleted', 0);

        if ($user_query_filter->get_id() != null) {
            $query = $query->where("sys_users.id", $user_query_filter->get_id());
        } else {
            return $this->error_response('Invalid parameter', 400);
        }

        $results = $query->update([
            'sys_users.deleted'   => 1
        ]);

        if ($results) {
            return $this->success_response($results);
        } else {
            return $this->error_response('Internal Server Error');
        }
    }

    public function add(Request $request)
    {
        $user_query_filter = new UserQueryFilter($request);

        $param_error_msg = null;
        if ($user_query_filter->getUsername() == '') {
            $param_error_msg = 'Username is empty';
        } else if ($user_query_filter->getFullName() == '') {
            $param_error_msg = 'Fullname is empty';
        } else if ($user_query_filter->getRoleCode() == '') {
            $param_error_msg = 'Role code is empty';
        } else if ($user_query_filter->getInstanceId() == '') {
            $param_error_msg = 'Instance id is empty';
        } else if ($user_query_filter->getEmail() == '') {
            $param_error_msg = 'Email is empty';
        } else if ($user_query_filter->getAddress() == '') {
            $param_error_msg = 'Address is empty';
        }

        if ($param_error_msg !== null) {
            return $this->error_response($param_error_msg, 400);
        }

        $new_id             = (string) Str::uuid();

        if (Auth::user()->role_code == ADMIN_INSTANSI) {

            $new_id             = (string) Str::uuid();

            $payload = [
                'id'            => $new_id,
                'username'      => $user_query_filter->getUsername(),
                'fullname'      => $user_query_filter->getFullName(),
                'instance_id'   => Auth::user()->instance_id,
                'email'         => $user_query_filter->getEmail(),
                'address'       => $user_query_filter->getAddress(),
                'role_code'     => STAFF_INSTANSI
            ];
        } else {

            $payload = [
                'id'            => $new_id,
                'username'      => $user_query_filter->getUsername(),
                'fullname'      => $user_query_filter->getFullName(),
                'role_code'     => $user_query_filter->getRoleCode(),
                'instance_id'   => $user_query_filter->getInstanceId(),
                'email'         => $user_query_filter->getEmail(),
                'address'       => $user_query_filter->getAddress()
            ];
        }

        $inserted = User::create($payload);

        if ($inserted) {

            $mail_content   = [
                'fullname'  => $user_query_filter->getFullName(),
                'redirect'  => url('/') . '/activate?id=' . $new_id
            ];

            $this->send_mail([
                ['email' => $user_query_filter->getEmail()]
            ], $mail_content);

            return $this->success_response($payload);
        } else {

            return $this->error_response('Internal server error');
        }
    }

    public function edit(Request $request)
    {
        $user_query_filter = new UserQueryFilter($request);

        $param_error_msg = null;
        if ($user_query_filter->getUsername() == '') {
            $param_error_msg = 'Username is empty';
        } else if ($user_query_filter->getFullName() == '') {
            $param_error_msg = 'Fullname is empty';
        } else if ($user_query_filter->getRoleCode() == '') {
            $param_error_msg = 'Role code is empty';
        } else if ($user_query_filter->getInstanceId() == '') {
            $param_error_msg = 'Instance id is empty';
        } else if ($user_query_filter->getEmail() == '') {
            $param_error_msg = 'Email is empty';
        } else if ($user_query_filter->getAddress() == '') {
            $param_error_msg = 'Address is empty';
        }

        if ($param_error_msg !== null) {
            return $this->error_response($param_error_msg, 400);
        }

        DB::beginTransaction();

        $query = User::where('sys_users.deleted', 0);
        $query_get_same_username = User::where('sys_users.deleted', 0);

        if ($user_query_filter->get_id() != null) {
            $query = $query->where("sys_users.id", $user_query_filter->get_id());
        } else {
            return $this->error_response('Invalid parameter', 400);
        }

        if ($user_query_filter->getUsername() !== null) {
            $query_get_same_username = $query_get_same_username
                ->where('sys_users.id', '!=', $user_query_filter->get_id())
                ->where('sys_users.username', $user_query_filter->getUsername());
            $result_same = $query_get_same_username->get();

            if ($result_same->count() > 0) {
                return $this->error_response('Duplicated username', 400);
            }
        }

        $results = $query->update([
            'username'      => $user_query_filter->getUsername(),
            'fullname'      => $user_query_filter->getFullName(),
            'role_code'     => $user_query_filter->getRoleCode(),
            'instance_id'   => $user_query_filter->getInstanceId(),
            'email'         => $user_query_filter->getEmail(),
            'address'       => $user_query_filter->getAddress(),
        ]);

        if ($results) {
            DB::commit();
            return $this->success_response($results);
        } else {
            DB::rollback();
            return $this->error_response('Internal server error');
        }
    }

    public function verify(Request $request)
    {
        $user_query_filter = new UserQueryFilter($request);

        $param_error_msg = null;
        if ($user_query_filter->getPassword() == '') {
            $param_error_msg = 'Password is empty';
        }

        if ($param_error_msg !== null) {
            return $this->error_response($param_error_msg, 400);
        }

        DB::beginTransaction();

        $query = User::where('sys_users.deleted', 0);

        if ($user_query_filter->get_id() != null) {
            $query = $query->where("sys_users.id", $user_query_filter->get_id());
        } else {
            return $this->error_response('Invalid parameter', 400);
        }

        $results = $query->update([
            'pwd'  => bcrypt($user_query_filter->getPassword())
        ]);

        if ($results) {
            DB::commit();
            return $this->success_response($results);
        } else {
            DB::rollback();
            return $this->error_response('Internal server error');
        }
    }



    private function send_mail($to, $content)
    {
        $url = 'http://mailer.bigio.id/v1/send';

        $data = [
            'key' => MAILER_KEY,
            'from' => [
                'email' => 'noreply@bigio.id',
                'name' => 'Admin AntriQhuy'
            ],
            'to' => $to,
            'subject' => 'Aktivasi Akun Baru Untuk AntriQhuy Apps',
            'message_html' => view('webadmin::webadmin/user_management/email', $content)->render(),
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $response = curl_exec($curl);

        curl_close($curl);
    }
}
