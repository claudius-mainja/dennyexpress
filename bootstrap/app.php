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
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (\Throwable $e) {
            return response(
                "Error: {$e->getMessage()}\nFile: {$e->getFile()}:{$e->getLine()}\nTrace:\n{$e->getTraceAsString()}",
                500,
                ['Content-Type' => 'text/plain']
            );
        });
    })->create();
