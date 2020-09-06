<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Topic;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {
    return [
        //on aura besoin d'un faux titre à chaque fois 
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'user_id' =>factory('App\User')->create()
    ];
});
