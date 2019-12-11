<?php

use Faker\Generator as Faker;

$factory->define(\App\Model\Role::class, function (Faker $faker) {
    return [
        'name'=>'超级管理员',
        'description' => $faker->word,
    ];
});
