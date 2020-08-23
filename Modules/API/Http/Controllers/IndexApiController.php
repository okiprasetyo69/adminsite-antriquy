<?php

namespace Modules\API\Http\Controllers;

use Modules\API\Http\Controllers\BaseApiController;

class IndexApiController extends BaseApiController{

    public function index(){
        $salt = "CASDQWE21312"; // ini ngambil dari db by email
        $password = "12345" . $salt;
        $password_hash = bcrypt($password);


        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $token='ddOBOooboI8:APA91bEEfpIKRdV5ba2boNTfcGqNlsijGIbl_ytvK07raDdYtCQhjNd3xjoYGBxWEVBmih9-loF5cBbGbltTlnJOjGF26X75N-RMse6_lIidarhr5Q2lPQj6ddSpggZdpkzs-m5FbDsJ';

        $notification = [
            'body' => 'Antrian anda tinggal 5 lagi, siap-siap yaa',
            'sound' => true,
        ];

        $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

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
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        dd($result);

        return response()->json($this->response, 200);
    }

}
