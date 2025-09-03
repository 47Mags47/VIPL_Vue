<?php

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
    )
    ->withSchedule(function (Schedule $schedule) {
        $schedule->job(new App\Jobs\Shedules\ClearInvitesJob, 'shedules')->daily();
    })
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo(fn() => route('session.create'));

        $middleware->web(append: [
            App\Http\Middleware\HandleInertiaRequests::class,
            App\Http\Middleware\AuthorizationActionMiddleware::class,
        ]);
        $middleware->alias([
            'has-permission' => App\Http\Middleware\HasPermissionMiddleware::class
        ]);
    })
    ->withExceptions(function (): void {
        //
    })->create();
