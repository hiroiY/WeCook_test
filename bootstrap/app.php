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
<<<<<<< HEAD
        //
=======
        $middleware->validateCsrfTokens(except: [
            'stripe/*',
        ]);
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
