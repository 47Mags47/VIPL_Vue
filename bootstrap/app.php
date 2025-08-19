<?php

use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\HasPermissionMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo(fn (Request $request) => route('session.create'));

        $middleware->web(append: [
            HandleInertiaRequests::class,
        ]);
        $middleware->alias([
            'has-permission' => HasPermissionMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
