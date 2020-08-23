<?php

namespace App\Http\Controllers;

use stdClass;

use App\Helpers\FormValidator;

use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user() == null) {
            return view('auth.login');
        } else{
            if(Session::get('role') == 'admin_instansi'){
                return redirect('/webadmin');
            } else {
                return redirect('/manajemen-instansi');
            }
        }
    }

    public function activate()
    {
        return view('auth.verify');
    }
}
