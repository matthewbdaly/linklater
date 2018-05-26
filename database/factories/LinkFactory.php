<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(LinkLater\Eloquent\Models\Link::class, function (Faker $faker) {
    static $password;

    return [
        'link' => $faker->url,
        'title' => $faker->sentence(6),
        'user_id' => $faker->uuid,
    ];
});
