<?php

namespace App\Exceptions;

use Log;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof MethodNotAllowedHttpException) {
            Log::error(date('Y-m-d H:i:s') . ' Mengakses ' . $request->url() . ' melalui method yang tidak sesuai dengan method telah didefinisikan!');

            return response()->json([
                'code' => 405,
                'message' => 'Method not allowed!',
                'url_requested' => $request->url(),
                'full_url_requested' => $request->fullUrl(),
                'method_used' => $request->method(),
            ], 405);
        }

        return parent::render($request, $exception);
    }
}
