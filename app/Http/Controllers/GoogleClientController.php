<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleClientController extends Controller
{
    public function verify(Request $request){
        $authCode   = $request->get('code');

        $fetch_token = json_decode(g_calendar_set_token($authCode));

        if($fetch_token->code == 200){
            return redirect('/calendar');
        } else {
            return 'Terjadi kesalahan.';
        }
    }
}
