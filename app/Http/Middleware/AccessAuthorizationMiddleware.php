<?php

namespace App\Http\Middleware;

use Closure;

class AccessAuthorizationMiddleware
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
        $uri                = '/' . $request->route()->uri;

        $authorized = do_i_have_access_for($uri);

        if($authorized){
            $access     = get_access_menu_by_action($uri);

            $options    = $access[0]->options;
            if($options !== null){
                $request->merge([
                    'SYS_ROLES_OPT' => json_decode($options)->roles
                ]);
            }
            
            return $next($request);
        } else {
            abort(403, 'Anda tidak dapat mengakses halaman ini!');
        }
    }
}
