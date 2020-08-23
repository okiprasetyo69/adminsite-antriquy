<?php

namespace App\Http\Middleware\Permissions;

use Closure;

use App\User;
use Illuminate\Support\Facades\Auth;

class KehadiranAnggotaMiddleware
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
        $permissions = json_decode(
            session('permission')
        );
        if(property_exists($permissions, 'kehadiran_anggota')){
            if($permissions->kehadiran_anggota->active == true ){
                return $next($request);
            } else {
                abort(403, 'Anda tidak dapat mengakses halaman ini!');
            }
        } else {
            abort(403, 'Anda tidak dapat mengakses halaman ini!');
        }
        // foreach($permissions as $permission){
        //     if($permission->nama_fungsi == 'k_anggota'){
        //         if($permission->read == true && $permission->write == true){
        //             return $next($request);
        //         } else {
        //             abort(403, 'Anda tidak dapat mengakses halaman ini!');
        //         }
        //     }
        // }
    }
}
