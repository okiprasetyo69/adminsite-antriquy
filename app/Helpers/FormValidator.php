<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Validator;

class FormValidator
{

    /**
     * Melakukan pengecekan (validasi) pada form secara server-side
     * @param Request $request
     * @return JSON $obj->status
     */
    public static function validate(Request $request, $exceptions){
        $validateThis = [];

        $validationMessages = [
            'email' => 'Email yang dimasukkan tidak valid!',
            'required' => 'Kolom data :attribute tidak boleh kosong!',
        ];

        foreach(array_keys($request->all()) as $keys){
            $validateThis[$keys] = 'required';

            if(is_array($request->get($keys))){
                $validateThis[$keys.'.*'] = 'required';
            }

            foreach($exceptions as $exception){
                if($keys == $exception){
                    unset($validateThis[$keys]);
                    if(is_array($request->get($keys))){
                        unset($validateThis[$keys.'.*']);
                    }
                }
            }
        }

        if($request->has(['email'])){
            $validateThis['email'] .= '|email';
        }

        $validation = Validator::make($request->all(), $validateThis, $validationMessages);

        if($validation->fails()){
            $errors = $validation->errors();

            foreach(array_keys($validateThis) as $keys){
                if(!empty($errors->first($keys))){
                    Log::error($errors->first($keys));
                    throw new \Exception($errors->first($keys));
                }
            }
        }
    }
}