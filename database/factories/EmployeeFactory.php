<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;
use App\User;

$factory->define(Employee::class, function (Faker $faker) {
    $user = User::create([
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    ]);
    return [
        'name' => $user->name,
        'email' => $user->email,
        'phone' => $faker->e164PhoneNumber,
        'address' => $faker->address,
        'designation_id' => 1,
        'department_id' => 1,
        'salary_type'=> 'monthly',
        'salary' => rand(1000,1000000),
        'started_from' => \Carbon\Carbon::yesterday()->toDateString(),
        'user_id' => $user->id,
    ];
});
