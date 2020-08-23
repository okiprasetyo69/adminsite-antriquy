<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        //permissions
        'dashboard' => \App\Http\Middleware\Permissions\DashboardMiddleware::class,
        'k_anggota' => \App\Http\Middleware\Permissions\KehadiranAnggotaMiddleware::class,
        'k_kehadiran' => \App\Http\Middleware\Permissions\KehadiranMiddleware::class,
        'penggajian' => \App\Http\Middleware\Permissions\PenggajianMiddleware::class,
        'perizinan' => \App\Http\Middleware\Permissions\PerizinanMiddleware::class,
        'p_pola_kerja' => \App\Http\Middleware\Permissions\P_PolaKerjaMiddleware::class,
        'p_perizinan' => \App\Http\Middleware\Permissions\P_PerizinanMiddleware::class,
        'p_departemen' => \App\Http\Middleware\Permissions\P_DepartemenMiddleware::class,
        'p_jabatan' => \App\Http\Middleware\Permissions\P_JabatanMiddleware::class,
        'p_jenis_gaji' => \App\Http\Middleware\Permissions\P_JenisGajiMiddleware::class,
        'p_outlet' => \App\Http\Middleware\Permissions\P_OutletMiddleware::class,
        'p_cuti' => \App\Http\Middleware\Permissions\P_CutiMiddleware::class,
        'p_public_holiday' => \App\Http\Middleware\Permissions\P_PublicHolidayMiddleware::class,
        'p_kebijakan_absensi' => \App\Http\Middleware\Permissions\P_KebijakanAbsensiMiddleware::class,
        'personalia' => \App\Http\Middleware\Permissions\PersonaliaMiddleware::class,
        'pengumuman' => \App\Http\Middleware\Permissions\PengumumanMiddleware::class,
        
        'access_authorization' => \App\Http\Middleware\AccessAuthorizationMiddleware::class,

        'payroll_api_auth' => \App\Http\Middleware\API\Auth::class,
    ];

    /**
     * The priority-sorted list of middleware.
     *
     * This forces non-global middleware to always be in the given order.
     *
     * @var array
     */
    protected $middlewarePriority = [
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\Authenticate::class,
        \Illuminate\Routing\Middleware\ThrottleRequests::class,
        \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \Illuminate\Auth\Middleware\Authorize::class,
    ];
}
