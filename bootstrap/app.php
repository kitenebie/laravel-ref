<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // In laravel 11 only
        //TODO: #3 Register the middleware
        $middleware->alias([
                //TODO: #4 create a alias name for the middleware made
                'SecurityCheckUserType' => \App\Http\Middleware\UserTypeAuth::class,
            ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
