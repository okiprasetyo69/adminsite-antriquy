<?php

namespace App\Http\Middleware\Permissions;

use Closure;

use App\User;
use Illuminate\Support\Facades\Auth;

class P_JenisGajiMiddleware
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
        
        // foreach($permissions as $permission){
        //     if($permission->nama_fungsi == 'p_jenis_gaji'){
        //     
        if(property_exists($permissions, 'pengaturan_jenis_gaji')){
            if($permissions->pengaturan_jenis_gaji->active == true){
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
