<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'position' => $faker->randomElement(['Senior Trouble Maker', 'Junior Problem Creator', 'Zam Direktor', 'Chief Executive Chef', 'Useless Ideas Generator', 'Master Lomaster','Chief Party Organizer', 'CEO of Planet Mars']),
        'on_vacation'=> $faker->randomElement(['1', '0']),

    ];
});
