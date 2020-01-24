<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;
use App\User; 

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->text,
        //'author_id' => User::where('is_author', 1)->inRandomOrder()->first()->id,
    ];
});
