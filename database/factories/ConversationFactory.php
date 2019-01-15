<?php

use Faker\Generator as Faker;

$factory->define(App\Conversation::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min=1, $max=20),
        'friend_id' => $faker->numberBetween($min=1, $max=20),
        'conversation' => $faker->text($maxNbChars = 150)
    ];
});
