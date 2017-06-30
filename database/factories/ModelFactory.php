<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\Comment::class, function (Faker\Generator $faker) {

    return [
        'post_id' => App\Post::all()->random()->id,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'comment' => $faker->paragraph(3),
    ];
});

/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'role' => 1,
        'remember_token' => str_random(10),
    ];
});*/

/*$factory->define(App\Post::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->word,
        'user_id' => App\User::all()->random()->id,
        'body' => $faker->paragraph(10),
        'visible' => 0,
    ];
});*/
