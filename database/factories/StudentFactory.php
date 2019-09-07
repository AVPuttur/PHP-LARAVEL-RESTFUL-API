<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        //create fake data
        'FNAME' => $faker->name,
        'LNAME' => $faker->name,
        'EMAIL' => $faker->safeEmail,
        'TELEPHONE' => $faker->phoneNumber
    ];
});
