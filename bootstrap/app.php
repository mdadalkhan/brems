<?php

use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Inertia\Inertia;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            HandleInertiaRequests::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Use \Throwable with a backslash to avoid the "non-compound name" warning
        $exceptions->render(function (\Throwable $e, Request $request) {
            
            $status = $e instanceof \Symfony\Component\HttpKernel\Exception\HttpException
                ? $e->getStatusCode()
                : 500;

            // When debugging is OFF, or for 404s, show the Svelte Error page
            if (!config('app.debug') || $status === 404) {
                return Inertia::render('Errors/Error', [
                    'status' => $status,
                ])->toResponse($request)->setStatusCode($status);
            }

            return null;
        });
    })->create();