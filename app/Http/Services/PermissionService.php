<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;


class PermissionService
{
    public function InitRoutes()
    {
        return (new Collection(Route::getRoutes()))
            ->map(function ($route) {
                $method          = $route->methods[0];
                $route->routeRule = "{$method}:{$route->uri}";
                return $route;
            });
    }
}
