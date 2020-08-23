<?php

namespace App\Http\Middleware\Permissions;

use Closure;

use App\User;
use Illuminate\Support\Facades\Auth;

class P_OutletMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $user = User::find(Auth::user()->id)->with('jabatan')->first();
        // $permissions = json_decode($user->jabatan->permission);
        $permissions = json_decode(
            session('permission')
        );
        // foreach($permissions as $permission){
        //     if($permission->nama_fungsi == 'p_outlet'){
        if(property_exists($permissions, 'pengaturan_outlet')){
            if($permissions->pengaturan_outlet->active == true){
                return $next($request);
            } else {
                abort(403, 'Anda tidak dapat mengakses halaman ini!');
            }
        } else {
            abort(403, 'Anda tidak dapat mengakses halaman ini!');
        }       
        //     }
        // }
    }
}
