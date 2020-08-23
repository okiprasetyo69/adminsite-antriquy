<?php

namespace App\Http\Middleware\API;

use Closure;

class Auth
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
        $API_SECRET_KEY = $request->header('x-api-key');

        $conf_api_secret_key = \Config::get('app.payroll_api_auth.API_SECRET_KEY');

        if(\Hash::check($API_SECRET_KEY, $conf_api_secret_key)){
            return $next($request);
        } else {
            return response()->json([
                'code' => 401,
                'message' => 'Unauthorized.',
            ], 401);
        }
    }
}
