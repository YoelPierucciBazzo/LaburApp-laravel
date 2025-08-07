<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Aquí ponés middlewares globales
        \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        // otros middlewares
    ];

    protected $middlewareGroups = [
        'web' => [
            // middlewares para web
        ],
        'api' => [
            // middlewares para api
        ],
    ];

    protected $routeMiddleware = [
        // middlewares para rutas individuales
    ];
}
