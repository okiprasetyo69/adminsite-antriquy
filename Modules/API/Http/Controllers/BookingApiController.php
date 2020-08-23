<?php

namespace Modules\API\Http\Controllers;

use App\Helpers\DateHelper;
use App\MstInstances;
use App\SysMobileUser;
use App\TrxBookQueue;
use App\TrxInstanceHistoryQueue;
use App\TrxInstanceHistoryQueueDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\API\Http\Controllers\BaseApiController;
use Modules\API\Http\Controllers\Forms\BookingForm;
use Modules\API\Http\Controllers\Forms\BookingOfflineForm;
use Modules\API\Http\Controllers\QueryFilters\BookingQueryFilter;

class BookingApiController extends BaseApiController{

    public function find_history(Request $request){
        $booking_query_filter = new BookingQueryFilter($request);

        $query = TrxInstanceHistoryQueueDetail::with(['instance_data'])
            ->where("user_mobile_id", $booking_query_filter->get_user_mobile_id());
        $query_for_count = TrxInstanceHistoryQueueDetail::with(['instance_data'])
            ->where("user_mobile_id", $booking_query_filter->get_user_mobile_id());

        if ($booking_query_filter->get_id() != null){
            $query = $query->where('id', $booking_query_filter->get_id());
            $query_for_count = $query_for_count->where('id', $booking_query_filter->get_id());
        }

        if ($booking_query_filter->get_status() != null){
            $query = $query->where('status', $booking_query_filter->get_status());
            $query_for_count = $query_for_count->where('status', $booking_query_filter->get_status());
        }

        $query = $query->orderByRaw("updated_at DESC");

        $this->set_datatable_response($booking_query_filter->get_draw(), $query_for_count->count(), $query->get());

        return $this->success_response_datatable();
    }

    public function find_active(Request $request){
        $booking_query_filter = new BookingQueryFilter($request);

        $query = TrxInstanceHistoryQueueDetail::with(['instance_data'])
                        ->where("user_mobile_id", $booking_query_filter->get_user_mobile_id());

        $query = $query->whereRaw('status in('.BOOKING_STATUS_NEW.', '.BOOKING_STATUS_PROCESS .')');
        $query = $query->orderByRaw("updated_at ASC");

        $this->set_datatable_response($booking_query_filter->get_draw(), $query->count(), $query->get());

        return $this->success_response_datatable();
    }

    public function book(Request $request){
        $booking_form = new BookingForm($request);
        $validate = $booking_form->validate();

        if ($validate != "") {
            return $this->error_response($validate);
        }

        $data_field = $booking_form->convert_form_field();

        $user_mobile_data = SysMobileUser::whereRaw("deleted = 0")->where('id', $data_field["user_mobile_id"])->first();
        if ($user_mobile_data == null){
            return $this->error_response("User tidak ditemukan!");
        }
        $instance_data = MstInstances::with(['setting_data'])->whereRaw("deleted = 0")->where('id', $data_field["instance_id"])->first();
        if ($instance_data == null){
            return $this->error_response("Instansi tidak ditemukan!");
        }

        // check settingan dulu
        if ($instance_data->setting_data == null){
            return $this->error_response("Belum ada pengaturan untuk instansi tersebut");
        }
        $setting_data = $instance_data->setting_data;
        if (!DateHelper::is_valid_start_time_booking($setting_data->start_time)){
            return $this->error_response("Mohon maaf antrian belum dibuka!");
        }
        if (!DateHelper::is_valid_end_time_booking($setting_data->end_time)){
            return $this->error_response("Mohon maaf antrian sudah ditutup!");
        }
        if ($setting_data->is_close_queue == 1){
            return $this->error_response("Mohon maaf antrian sudah ditutup!");
        }

        // check ke history, sekarang sudah antrian berapa
        $trx_instance_history_queue_data = TrxInstanceHistoryQueue::where('instance_id', $data_field["instance_id"])->where('date', DateHelper::now_without_hours())->first();
        DB::beginTransaction();
        try{
            $date_now = DateHelper::now_without_hours();
            if ($trx_instance_history_queue_data != null){
                if ($setting_data->max_queue > 0){
                    if ($setting_data->max_queue < $trx_instance_history_queue_data->total_queue){
                        return $this->error_response("Mohon maaf antrian sudah penuh!");
                    }
                }
                $queue = $trx_instance_history_queue_data->total_queue + 1;

                $trx_instance_history_queue_data->total_queue = $queue;
                $trx_instance_history_queue_data->save();
            }
            else {
                $instance_history_queue_id = (string)Str::uuid();
                $queue = 1;
                $data_instance_history_queue = array(
                    'id' => $instance_history_queue_id,
                    'instance_id' => $data_field["instance_id"],
                    'date' => $date_now,
                    'last_queue' => 0,
                    'total_queue' => $queue
                );

                $trx_instance_history_queue_data = TrxInstanceHistoryQueue::create($data_instance_history_queue);
            }
            $queue_no = $instance_data->queue_front_format . $queue . $instance_data->queue_back_format;
            $data_instance_history_queue_detail = array(
                'id' => (string)Str::uuid(),
                'instance_history_queue_id' => $trx_instance_history_queue_data->id,
                'name' => $data_field["name"],
                'date' => $date_now,
                'queue_no' => $queue_no,
                'queue' => $queue,
                'book_time' => DateHelper::now_hours(),
                'status' => 0,
                'instance_id' => $data_field["instance_id"],
                'user_mobile_id' => $data_field["user_mobile_id"]
            );

            $trx_instance_history_queue_detail_data = TrxInstanceHistoryQueueDetail::create($data_instance_history_queue_detail);

            DB::commit();
            return $this->success_response($trx_instance_history_queue_detail_data);
        } catch (\Exception $e) {
            // Rollback Transaction
            DB::rollback();

            return $this->error_response("Booking Antrian Gagal!");
        }
    }

    public function book_offline(Request $request){
        $booking_form = new BookingOfflineForm($request);
        $validate = $booking_form->validate();

        if ($validate != "") {
            return $this->error_response($validate);
        }

        $data_field = $booking_form->convert_form_field();

        $data_field["instance_id"] = Auth::user()->instance_id;
        $instance_data = MstInstances::with(['setting_data'])->whereRaw("deleted = 0")->where('id', $data_field["instance_id"])->first();
        if ($instance_data == null){
            return $this->error_response("Instansi tidak ditemukan!");
        }

        // check settingan dulu
        if ($instance_data->setting_data == null){
            return $this->error_response("Belum ada pengaturan untuk instansi tersebut");
        }
        $setting_data = $instance_data->setting_data;
        if (!DateHelper::is_valid_start_time_booking($setting_data->start_time)){
            return $this->error_response("Mohon maaf antrian belum dibuka!");
        }
        if (!DateHelper::is_valid_end_time_booking($setting_data->end_time)){
            return $this->error_response("Mohon maaf antrian sudah ditutup!");
        }
        if ($setting_data->is_close_queue == 1){
            return $this->error_response("Mohon maaf antrian sudah ditutup!");
        }

        // check ke history, sekarang sudah antrian berapa
        $trx_instance_history_queue_data = TrxInstanceHistoryQueue::where('instance_id', $data_field["instance_id"])->where('date', DateHelper::now_without_hours())->first();
        DB::beginTransaction();
        try{
            $date_now = DateHelper::now_without_hours();
            if ($trx_instance_history_queue_data != null){
                if ($setting_data->max_queue > 0){
                    if ($setting_data->max_queue < $trx_instance_history_queue_data->total_queue){
                        return $this->error_response("Mohon maaf antrian sudah penuh!");
                    }
                }
                $queue = $trx_instance_history_queue_data->total_queue + 1;

                $trx_instance_history_queue_data->total_queue = $queue;
                $trx_instance_history_queue_data->save();
            }
            else {
                $instance_history_queue_id = (string)Str::uuid();
                $queue = 1;
                $data_instance_history_queue = array(
                    'id' => $instance_history_queue_id,
                    'instance_id' => $data_field["instance_id"],
                    'date' => $date_now,
                    'last_queue' => 0,
                    'total_queue' => $queue
                );

                $trx_instance_history_queue_data = TrxInstanceHistoryQueue::create($data_instance_history_queue);
            }
            $queue_no = $instance_data->queue_front_format . $queue . $instance_data->queue_back_format;
            $data_instance_history_queue_detail = array(
                'id' => (string)Str::uuid(),
                'instance_history_queue_id' => $trx_instance_history_queue_data->id,
                'name' => $data_field["name"],
                'date' => $date_now,
                'queue_no' => $queue_no,
                'queue' => $queue,
                'book_time' => DateHelper::now_hours(),
                'status' => 0,
                'instance_id' => $data_field["instance_id"]
            );

            $trx_instance_history_queue_detail_data = TrxInstanceHistoryQueueDetail::create($data_instance_history_queue_detail);

            DB::commit();
            return $this->success_response($trx_instance_history_queue_detail_data);
        } catch (\Exception $e) {
            // Rollback Transaction
            DB::rollback();

            return $this->error_response("Booking Antrian Gagal!");
        }
    }
}
