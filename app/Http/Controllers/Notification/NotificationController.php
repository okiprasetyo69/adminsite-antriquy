<?php

namespace App\Http\Controllers\Notification;

use App;
use Auth;
use Log;

use App\Http\Models\Notification\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    private $model_sys_notification;

    public function __construct(){
        $this->model_sys_notification   = new Notification();
    }

    public function get_latest(Request $request){
        try {
            $type = $request->get('type');
            $data = [];
            $response   = [];

            if($type == 1){
                $data       = $this->model_sys_notification->get_latest(Auth::user()->id, 0, MAX_NOTIFICATION_SHOWN);
                foreach($data as $row){
                    array_push($response, [
                        'is_read'   => $row->is_read,
                        'module'    => $row->module,
                        'message'   => $row->message,
                        'url'       => $row->url,
                        'time'      => date('Y-m-d H:i:s', strtotime($row->created_at))
                    ]);
                }
                return response()->json([
                    'code'      => 200,
                    'message'   => 'success',
                    'data'      => $response
                ], 200);
            } else{
                $response       = $this->model_sys_notification->get_all(Auth::user()->id, 0);
                return response()->json([
                    'code'      => 200,
                    'message'   => 'success',
                    'data'      => $response,
                    'pagination' => $response->links()
                ], 200);
            }
            
        } catch(\Exception $e){
            Log::error('File: '.$e->getFile().' | Line: '.$e->getLine().' | Message: '.$e->getMessage());
            if($e->getCode() == 500){
                return response()->json([
                    'code'      => $e->getCode(),
                    'message'   => 'Terjadi kesalahan di server!',
                    'data'      => []
                ], $e->getCode());
            } else {
                return response()->json([
                    'code'      => $e->getCode(),
                    'message'   => $e->getMessage(),
                    'data'      => []
                ], $e->getCode());
            }
        }
    }

    public function viewAll(){
        $data['title'] = 'Notifikasi';
        $data['haveBack'] = true; 
        $data['urlBack'] = url('/home');
        $data['namePageBack'] = "Dashboard"; 
        $data['result'] = $this->model_sys_notification->get_all(Auth::user()->id, 0);

        return view('notification', $data);
    }

    public function updateAll(){
        try {
            $response = $this->model_sys_notification->update_all_notification(Auth::user()->id);
            return response()->json([
                'code'      => 200,
                'message'   => 'success',
                'data'      => $response
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


}
