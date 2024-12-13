<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // middleware globales
    ];

    protected $middlewareGroups = [
        'web' => [
            // middleware del grupo web
        ],

        'api' => [
            // middleware del grupo api
        ],
    ];

    protected $middlewareAliases = [
        'locale' => \App\Http\Middleware\SetLocale::class,
        'common.validation' => \App\Http\Middleware\CommonValidation::class,
    ];
}
