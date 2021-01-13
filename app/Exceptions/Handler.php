<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Spatie\Permission\Exceptions\UnauthorizedException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthenticationException::class,
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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'],401);
        }
        $guard = $exception->guards()[0];

        if($guard == 'admin') {
            return redirect()->guest(route('admin.login'));
        }elseif($guard == 'organization') {
            return redirect()->guest(route('organizations.login'));
        }

        return redirect()->guest(route('login'));
    }

    // public function render($request, Exception $exception)
    // {
    //     if ($exception instanceof UnauthorizedException) {
    //         if(Auth::user() instanceof Admin){
    //             return redirect()->route('admin.dashboard');
    //         }
    //         return redirect()->route('front');
    //     }
        
    //     return parent::render($request, $exception);
    // }
}
