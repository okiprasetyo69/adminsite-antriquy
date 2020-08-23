<?php

namespace Modules\API\Http\Controllers;

use App\Helpers\DateHelper;
use App\MstInstances;
use App\SysMobileUser;
use App\TrxInstanceHistoryQueue;
use App\TrxInstanceHistoryQueueDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\API\Http\Controllers\BaseApiController;
use Modules\API\Http\Controllers\Forms\QueueProcessForm;
use Modules\API\Http\Controllers\QueryFilters\QueueQueryFilter;
use \Modules\WebAdmin\Entities\History;
use Illuminate\Support\Facades\Auth;
use Modules\WebAdmin\Entities\DetailHistory;

class QueueApiController extends BaseApiController
{
    function getInstanceId()
    {
        $instance_id = Auth::user()->instance_id;
        return $instance_id;
    }

    public function find(Request $request)
    {
        $queue_query_filter = new QueueQueryFilter($request);
        $instance_id = Auth::user()->instance_id;
        $query_for_count = History::where('instance_id', $instance_id);

        $startDate = DateHelper::now_without_hours();
        $endDate = DateHelper::now_without_hours();

        if ($request != null) {
            $startDate = $request->start;
            $endDate = $request->end;
        }

        $query =
            TrxInstanceHistoryQueue::leftJoin('trx_instance_history_queue_details', 'trx_instance_history_queues.id', '=', 'trx_instance_history_queue_details.instance_history_queue_id')
            ->select('trx_instance_history_queues.id as id', 'trx_instance_history_queues.date as date', 'trx_instance_history_queues.total_queue')
            ->selectRaw('count(case trx_instance_history_queue_details.status when -1 then 1 end) as total_queue_cancelled')
            ->selectRaw('count(case trx_instance_history_queue_details.status when 2 then 1 end) as total_queue_finished')
            ->groupBy('trx_instance_history_queues.id')
            ->where('trx_instance_history_queues.instance_id', $instance_id)
            ->whereBetween(DB::raw('DATE(trx_instance_history_queues.date)'), [$startDate, $endDate])
            ->orderBy('trx_instance_history_queues.date', 'desc');

        $results = $query->limit($queue_query_filter->get_length())->offset($queue_query_filter->get_start());

        $this->set_datatable_response($queue_query_filter->get_draw(), $query_for_count->count(), $results->get());

        return $this->success_response_datatable();
    }

    public function live_count(Request $request)
    {
        $queue_query_filter = new QueueQueryFilter($request);

        $query = "SELECT
                    COALESCE(total_queue, 0) as total_queue_today,
                    (select count(1) from trx_instance_history_queue_details where date = '" . DateHelper::now_without_hours() . "'
                        and instance_id = '" . $queue_query_filter->get_instance_id() . "' AND status in(0, 1)) as total_queue_process,
                    (select count(1) from trx_instance_history_queue_details where date = '" . DateHelper::now_without_hours() . "'
                        and instance_id = '" . $queue_query_filter->get_instance_id() . "' AND status not in(0, 1)) as total_queue_finish
                FROM trx_instance_history_queues where date = '" . DateHelper::now_without_hours() . "' and instance_id = '" . $queue_query_filter->get_instance_id() . "' and date = '" . DateHelper::now_without_hours() . "' ";

        $result = DB::select(DB::raw($query));

        return $this->success_response($result);
    }

    public function live(Request $request)
    {
        $queue_query_filter = new QueueQueryFilter($request);

        $query = TrxInstanceHistoryQueueDetail::where('instance_id', $queue_query_filter->get_instance_id())->where('date', DateHelper::now_without_hours());
        $query_for_count = TrxInstanceHistoryQueueDetail::where('instance_id', $queue_query_filter->get_instance_id())->where('date', DateHelper::now_without_hours());

        $query = $query->whereRaw('status in(' . BOOKING_STATUS_NEW . ', ' . BOOKING_STATUS_PROCESS . ')');
        $query_for_count = $query_for_count->whereRaw('status in(' . BOOKING_STATUS_NEW . ', ' . BOOKING_STATUS_PROCESS . ')');

        if ($queue_query_filter->get_id() != null) {
            $query = $query->where('id', $queue_query_filter->get_id());
            $query_for_count = $query_for_count->where('id', $queue_query_filter->get_id());
        }

        $query = $query->orderByRaw('queue ASC');

        $this->set_datatable_response($queue_query_filter->get_draw(), $query_for_count->count(), $query->get());

        return $this->success_response_datatable();
    }

    public function getQueueTotal(Request $request)
    {
        $startDate = DateHelper::now_without_hours();
        $endDate = DateHelper::now_without_hours();

        if ($request != null) {
            $startDate = $request->start;
            $endDate = $request->end;
        }

        $all_queue_total = TrxInstanceHistoryQueueDetail::where('instance_id', $this->getInstanceId())
            ->whereBetween(DB::raw('DATE(date)'), [$startDate, $endDate])
            ->count();

        $present_queue_total = TrxInstanceHistoryQueueDetail::where('instance_id', $this->getInstanceId())
            ->whereBetween(DB::raw('DATE(date)'), [$startDate, $endDate])
            ->where('status', 2)
            ->count();

        $unpresent_queue_total = TrxInstanceHistoryQueueDetail::where('instance_id', $this->getInstanceId())
            ->whereBetween(DB::raw('DATE(date)'), [$startDate, $endDate])
            ->where('status', -1)
            ->count();

        return response()->json([
            'code'      => 200,
            'message'   => 'success',
            'all_queue_total'      => $all_queue_total,
            'present_queue_total'      => $present_queue_total,
            'unpresent_queue_total'      => $unpresent_queue_total,
        ], 200);
    }

    public function process(Request $request)
    {
        $queue_process_form = new QueueProcessForm($request);
        $validate = $queue_process_form->validate();

        if ($validate != "") {
            return $this->error_response($validate);
        }

        $data_field = $queue_process_form->convert_form_field();

        $user_process_id = Auth::user()->id;
        $instance_id = Auth::user()->instance_id;

        if ($user_process_id == null || $instance_id == null) {
            return $this->error_response("Instansi dan user pemroses harus diisi");
        }

        $instance_queue_detail = TrxInstanceHistoryQueueDetail::where('id', $data_field["instance_history_queue_detail_id"])->first();
        if ($instance_queue_detail == null) {
            return $this->error_response("Antrian tidak ditemukan!");
        }

        if ($instance_queue_detail->instance_id != $instance_id) {
            return $this->error_response("Antrian tersebut bukan untuk instansi ini!");
        }

        $instance_queue = TrxInstanceHistoryQueue::where('id', $instance_queue_detail->instance_history_queue_id)->first();

        if ($instance_queue_detail->status != BOOKING_STATUS_NEW) {
            return $this->error_response("status antrian sudah diproses!");
        }

        $instance_queue_detail->status = BOOKING_STATUS_PROCESS;
        $instance_queue_detail->user_process_id = $user_process_id;
        $instance_queue_detail->process_time = DateHelper::now_hours();

        DB::beginTransaction();
        try {
            $instance_queue_detail->save();
            $instance_queue->last_queue = $instance_queue->last_queue + 1;

            $instance_queue->save();
            DB::commit();

            $this->send_notif($instance_queue, $instance_id);
        } catch (\Exception $e) {
            // Rollback Transaction
            DB::rollback();

            return $this->error_response("Proses Antrian Gagal!");
        }

        return $this->success_response($instance_queue_detail);
    }

    public function finish(Request $request)
    {
        $queue_process_form = new QueueProcessForm($request);
        $validate = $queue_process_form->validate();

        if ($validate != "") {
            return $this->error_response($validate);
        }

        $data_field = $queue_process_form->convert_form_field();

        $user_process_id = Auth::user()->id;
        $instance_id = Auth::user()->instance_id;

        if ($user_process_id == null || $instance_id == null) {
            return $this->error_response("Instansi dan user pemroses harus diisi");
        }

        $instance_queue_detail = TrxInstanceHistoryQueueDetail::where('id', $data_field["instance_history_queue_detail_id"])->first();
        if ($instance_queue_detail == null) {
            return $this->error_response("Antrian tidak ditemukan!");
        }

        if ($instance_queue_detail->user_process_id != $user_process_id) {
            return $this->error_response("Antrian harus diselesaikan oleh user yang memproses sebelumnya!");
        }

        if ($instance_queue_detail->instance_id != $instance_id) {
            return $this->error_response("Antrian tersebut bukan untuk instansi ini!");
        }

        if ($instance_queue_detail->status == BOOKING_STATUS_NEW) {
            return $this->error_response("status antrian masih menunggu, mohon untuk diproses terlebih dahulu!");
        }

        if ($instance_queue_detail->status != BOOKING_STATUS_PROCESS) {
            return $this->error_response("status antrian sudah selesai!");
        }

        $instance_queue_detail->status = BOOKING_STATUS_FINISH;
        $instance_queue_detail->finish_time = DateHelper::now_hours();

        $instance_queue_detail->save();

        return $this->success_response($instance_queue_detail);
    }

    public function cancel(Request $request)
    {
        $queue_process_form = new QueueProcessForm($request);
        $validate = $queue_process_form->validate();

        if ($validate != "") {
            return $this->error_response($validate);
        }

        $data_field = $queue_process_form->convert_form_field();

        $user_process_id = Auth::user()->id;
        $instance_id = Auth::user()->instance_id;

        if ($user_process_id == null || $instance_id == null) {
            return $this->error_response("Instansi dan user pemroses harus diisi");
        }

        $instance_queue_detail = TrxInstanceHistoryQueueDetail::where('id', $data_field["instance_history_queue_detail_id"])->first();
        if ($instance_queue_detail == null) {
            return $this->error_response("Antrian tidak ditemukan!");
        }

        if ($instance_queue_detail->instance_id != $instance_id) {
            return $this->error_response("Antrian tersebut bukan untuk instansi ini!");
        }

        $instance_queue = TrxInstanceHistoryQueue::where('id', $instance_queue_detail->instance_history_queue_id)->first();

        if ($instance_queue_detail->status != BOOKING_STATUS_NEW) {
            return $this->error_response("status antrian sudah diproses!");
        }

        $instance_queue_detail->status = BOOKING_STATUS_CANCEL;
        $instance_queue_detail->user_process_id = $user_process_id;
        $instance_queue_detail->process_time = DateHelper::now_hours();

        DB::beginTransaction();
        try {
            $instance_queue_detail->save();
            $instance_queue->last_queue = $instance_queue->last_queue + 1;

            $instance_queue->save();
            DB::commit();

            $this->send_notif($instance_queue, $instance_id);
        } catch (\Exception $e) {
            // Rollback Transaction
            DB::rollback();

            return $this->error_response("Proses Antrian Gagal!");
        }

        return $this->success_response($instance_queue_detail);
    }

    private function send_notif($instance_history_queue_data, $instance_id){
        $queue_data = TrxInstanceHistoryQueueDetail::where('instance_id', $instance_id)
                        ->where('date', DateHelper::now_without_hours())
                        ->where('status', BOOKING_STATUS_NEW)
                        ->whereRaw("((queue - ".$instance_history_queue_data->last_queue." = 10) OR
                                       (queue - ".$instance_history_queue_data->last_queue." = 5) OR
                                       (queue - ".$instance_history_queue_data->last_queue." = 3) OR
                                       (queue - ".$instance_history_queue_data->last_queue." = 2))")->get();

        for($i = 0; $i < count($queue_data); $i++){
            $user_data = SysMobileUser::where('deleted', 0)->where('id', $queue_data[$i]->user_mobile_id)->first();
            $instance_data = MstInstances::where('id', $instance_id)->first();
            if ($user_data != null){
                if ($user_data->firebase_token != null){
                    $diff_queue = $queue_data[$i]->queue - $instance_history_queue_data->last_queue;
                    $title = 'Antrian dengan nomor '. $queue_data[$i]->queue_no .' tinggal ' . $diff_queue . ' siap-siap yaa';
                    $body = 'Antrian dengan nomor '. $queue_data[$i]->queue_no .' ke instansi ' . $instance_data->name . ' tersisa ' . $diff_queue . ' lagi, harap untuk bersiap siap yaa;';
                    $this->send_to_firebase($user_data->firebase_token, $diff_queue, $title, $body);
                }
            }
        }
    }

    private function send_to_firebase($token, $diff_queue, $title, $body)
    {
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        //        $token='dnu70UDE4sc:APA91bHdapOxIlvaklcfhg3utxeIz8ZNl4OLpoRqcw6-nNc4U__1leY7NDGUa8-2bg8l9Bz3s9ArezfsQ7bBaKhOr58KV9eKHm2BYPiodloUUh-7uegJUugB9RaCtCk4mdvJSHGGoziW';

        $notification = [
            'title' => $title,
            'body' => $body,
            'sound' => true,
        ];

        $extraNotificationData = ["message" => $notification, "moredata" => 'dd'];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            'notification' => $notification,
            'data' => $extraNotificationData
        ];

        $headers = [
            'Authorization: key=' . env('FIREBASE_TOKEN'),
            'Content-Type: application/json'
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
