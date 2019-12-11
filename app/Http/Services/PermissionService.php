<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;


class PermissionService
{
    public static function InitRoutes()
    {
        return (new Collection(Route::getRoutes()))
            ->filter(function($route){
                $middlewares = $route->getAction()['middleware'];
                return in_array('rbac',$middlewares);
            })
            ->map(function ($route) {
                $method          = $route->methods[0];
                $route->routeRule = "{$method}:{$route->uri}";
                return $route;
            });
    }
}
