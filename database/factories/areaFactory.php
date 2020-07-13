<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\area;
use Faker\Generator as Faker;

$factory->define(area::class, function (Faker $faker) {
    return [
        'kode_area' => $faker->ean8,
        'nama_pekerjaan' => $faker->jobTitle,
        'lokasi' => $faker->address,
    ];
});
