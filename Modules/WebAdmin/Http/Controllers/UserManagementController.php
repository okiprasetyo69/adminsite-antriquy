<?php

namespace Modules\WebAdmin\Http\Controllers;

use App\MstInstances;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\API\Http\Controllers\QueryFilters\InstanceQueryFilter;

class UserManagementController extends Controller
{
    public function index()
    {
        $page_attributes    = [
            'title'             => 'Manajemen User',
            'sidebar_active'    => 'user_management',
            'breadcrumbs'       => [
                [
                    'label' => 'Manajemen User',
                    'url'   => '/user-management'
                ]
            ]
        ];

        return view('webadmin::webadmin/user_management/index', $page_attributes);
    }

    public function get_instance_collections(Request $request)
    {
        $instance_id = Auth::user()->instance_id;

        if (Auth::user()->role_code == ADMIN_INSTANSI) {

            $data = MstInstances::where('deleted', 0)->get();

            return response()->json([
                'code'      => 200,
                'message'   => 'success',
                'data'      => $data
            ], 200);
        } else {

            $data = MstInstances::where('deleted', 0)->get();

            return response()->json([
                'code'      => 200,
                'message'   => 'success',
                'data'      => $data
            ], 200);
        }
    }
}
