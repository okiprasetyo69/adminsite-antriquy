<?php

namespace App\Http\Controllers\Auth;

use App\User;

use Session;

use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/webadmin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request)
    {
        $user = User::where('username', request('username'))->where('deleted', '0')->first();
        $remember = $request->filled('remember');

        if($user !== null){
            if (\Hash::check($request->get('password'), $user->pwd)) {
                Auth::login($user);
                return redirect()->intended();
            }
        }
    }

    protected function authenticated(Request $request, $user)
    {
        $request->session()->put('role', $user->role_code);
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    public function username()
    {
        return 'username';
    }
}
