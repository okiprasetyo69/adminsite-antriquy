<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'api/instance/find',
        'api/instance/nearby',
        'api/auth/register',
        'api/auth/login',
        'api/booking/book',
        'api/booking/find_active',
        'api/booking/find_history',
        'api/queue/live',
        'api/queue/live_count',
        'api/queue/process',
        'api/queue/finish',
        'api/queue/cancel'
    ];
}
