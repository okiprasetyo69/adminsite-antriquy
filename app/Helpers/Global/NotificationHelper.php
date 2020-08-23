<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Modules\Pengaturan\Entities\SetJabatan;

use Modules\Personalia\Entities\PrsPegawai;

use App\Http\Models\Notification\Notification;

if (! function_exists('send_notification')) {
    function send_notification($user_id, $module, $message, $url){
        $model_sys_notification   = new Notification();

        //need authentication
        if(!empty(Auth::user())){
            try {
                $data['user_id']    = $user_id;
                $data['module']     = $module;
                $data['message']    = $message;
                $data['url']        = $url;
                $data['created_by'] = Auth::user()->id;
                
                $sent               = $model_sys_notification->add($data);
                
                if(!$sent){
                    throw new \Exception(json_encode([
                        'payload'   => $data,
                        'message'   => 'Terjadi kesalahan saat mengirim notifikasi'
                    ]));
                } else {
                    return response()->json([
                        'code'      => 200,
                        'message'   => 'success',
                        'data'      => []
                    ]);
                }
            } catch(\Exception $e){
                $error      = json_decode($e->getMessage());

                if(json_last_error() == JSON_ERROR_NONE){
                    $message    = $error->message;
                    $payload    = $error->payload;
    
                    \Log::error('(' . __FUNCTION__ . ') Payload: ' . json_encode($payload));
                    \Log::error('File: ' . $e->getFile
                        . ' | Line: '. $e->getLine()
                        . ' | Message: ' . $message);
    
                    \App::abort($e->getCode(), $message);
                } else {
                    \Log::error('(' . __FUNCTION__ . ') Payload: ' . json_encode($data));
                    \Log::error('File: ' . $e->getFile
                        . ' | Line: '. $e->getLine()
                        . ' | Message: ' . $e->getMessage);

                    \App::abort($e->getCode(), $e->getMessage());
                }
            }
        }
    }
}

if (! function_exists('send_notification_by_role')) {
    function send_notification_by_roles($roles, $module, $message, $url){
        $model_sys_notification   = new Notification();

        //need authentication
        if(!empty(Auth::user())){
            $data['roles']      = $roles;
            $data['module']     = $module;
            $data['message']    = $message;
            $data['url']        = $url;
            $data['created_by'] = Auth::user()->id;

            try {                
                $sent               = $model_sys_notification->add_by_roles($data);
                
                if(!$sent){
                    throw new \Exception(json_encode([
                        'payload'   => $data,
                        'message'   => 'Terjadi kesalahan saat mengirim notifikasi'
                    ]));
                } else {
                    return response()->json([
                        'code'      => 200,
                        'message'   => 'success',
                        'data'      => []
                    ]);
                }
            } catch(\Exception $e){
                $error      = json_decode($e->getMessage());

                if(json_last_error() == JSON_ERROR_NONE){
                    $message    = $error->message;
                    $payload    = $error->payload;
    
                    \Log::error('(' . __FUNCTION__ . ') Payload: ' . json_encode($payload));
                    \Log::error('File: ' . $e->getFile
                        . ' | Line: '. $e->getLine()
                        . ' | Message: ' . $message);
    
                    \App::abort($e->getCode(), $message);
                } else {
                    \Log::error('(' . __FUNCTION__ . ') Payload: ' . json_encode($data));
                    \Log::error('File: ' . $e->getFile
                        . ' | Line: '. $e->getLine()
                        . ' | Message: ' . $e->getMessage);

                    \App::abort($e->getCode(), $e->getMessage());
                }
            }
        }
    }
}

if (! function_exists('send_notification_by_roles_to_specific_outlets')) {
    function send_notification_by_roles_to_specific_outlets($roles, $outlet_ids, $module, $message, $url){
        $model_sys_notification   = new Notification();

        //need authentication
        if(!empty(Auth::user())){
            $data['roles']      = $roles;
            $data['module']     = $module;
            $data['message']    = $message;
            $data['url']        = $url;
            $data['created_by'] = Auth::user()->id;

            try {                
                $sent               = $model_sys_notification->add_by_roles_in_outlets($data, $outlet_ids);
                
                if(!$sent){
                    throw new \Exception(json_encode([
                        'payload'   => $data,
                        'message'   => 'Terjadi kesalahan saat mengirim notifikasi'
                    ]));
                } else {
                    return response()->json([
                        'code'      => 200,
                        'message'   => 'success',
                        'data'      => []
                    ]);
                }
            } catch(\Exception $e){
                $error      = json_decode($e->getMessage());

                if(json_last_error() == JSON_ERROR_NONE){
                    $message    = $error->message;
                    $payload    = $error->payload;
    
                    \Log::error('(' . __FUNCTION__ . ') Payload: ' . json_encode($payload));
                    \Log::error('File: ' . $e->getFile
                        . ' | Line: '. $e->getLine()
                        . ' | Message: ' . $message);
    
                    \App::abort($e->getCode(), $message);
                } else {
                    \Log::error('(' . __FUNCTION__ . ') Payload: ' . json_encode($data));
                    \Log::error('File: ' . $e->getFile
                        . ' | Line: '. $e->getLine()
                        . ' | Message: ' . $e->getMessage);

                    \App::abort($e->getCode(), $e->getMessage());
                }
            }
        }
    }
}

?>