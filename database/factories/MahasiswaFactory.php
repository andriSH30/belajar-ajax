<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\mahasiswa;
use Faker\Generator as Faker;

$factory->define(mahasiswa::class, function (Faker $faker) {
    return [
        //
        'nama' => $faker->name,
        'alamat' => $faker->secondaryAddress,
    ];
});
