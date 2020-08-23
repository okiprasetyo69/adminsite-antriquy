<?php

namespace Modules\API\Http\Controllers;

use App\SysMobileUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\API\Http\Controllers\BaseApiController;
use Modules\API\Http\Controllers\Forms\LoginForm;
use Modules\API\Http\Controllers\Forms\RegisterForm;

class AuthMobileApiController extends BaseApiController{

    public function login(Request $request){
        $login_form = new LoginForm($request);
        $validate = $login_form->validate();

        if ($validate != "") {
            return $this->error_response($validate);
        }
        $data_field = $login_form->convert_form_field();

        $user_data = SysMobileUser::where("deleted", 0)->where("username", $data_field["username"])->first();
        if ($user_data == null){
            return $this->error_response("Login gagal, Username tidak ditemukan!");
        }
        $password = $data_field["password"] . $user_data->salt;
        if (!Hash::check($password, $user_data->pwd)){
            return $this->error_response("Login Gagal!");
        }

        $user_data->firebase_token = $data_field["firebase_token"];
        $user_data->save();

        return $this->success_response($user_data);
    }

    public function register(Request $request){
        $register_form = new RegisterForm($request);
        $validate = $register_form->validate();

        if ($validate != "") {
            return $this->error_response($validate);
        }

        $data_field = $register_form->convert_form_field();

        $user_data_with_username = SysMobileUser::whereRaw("deleted = 0")->where("username", $data_field["username"])->first();
        if ($user_data_with_username != null){
            return $this->error_response("Username sudah digunakan!");
        }
        $user_data_with_email = SysMobileUser::whereRaw("deleted = 0")->where("email", $data_field["email"])->first();
        if ($user_data_with_email != null){
            return $this->error_response("Email sudah digunakan!");
        }

        $data_field["id"] = (string) Str::uuid();
        $salt = (String) Str::random(10);
        $data_field["salt"] = $salt;
        $data_field["pwd"] = bcrypt($data_field["password"] . $salt);

        $user_mobile_create = SysMobileUser::create($data_field);

        return $this->success_response($user_mobile_create);
    }

}
