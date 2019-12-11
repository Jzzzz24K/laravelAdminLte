<?php

use Faker\Generator as Faker;

$factory->define(\App\Model\Permission::class, function (Faker $faker) {
    return [
        'name'=>'超级权限',
        'routes'=>implode(',',\App\Services\PermissionService::InitRoutes()->map(function($route){
            return $route->routeRule;
        })->toArray())
    ];
});
