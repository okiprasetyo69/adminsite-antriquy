<?php

namespace App\Http\Middleware\Permissions;

use Closure;

use App\User;
use Illuminate\Support\Facades\Auth;

class P_PerizinanMiddleware
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
        //     if($permission->nama_fungsi == 'p_perizinan'){
        if(property_exists($permissions, 'pengaturan_perizinan')){
            if($permissions->pengaturan_perizinan->active == true){
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
