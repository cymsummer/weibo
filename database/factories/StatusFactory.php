<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

<<<<<<< HEAD
use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Status::class, function (Faker $faker) {
    $date_time=$faker->date.''.$faker->time;
    return [
        'user_id'=>$faker->randomElement(['1','2','3']),
        'content'=>$faker->text(),
        'created_at'=>$date_time,
        'updated_at'=>$date_time
=======
use App\Models\Status;
use Faker\Generator as Faker;

$factory->define(Status::class, function (Faker $faker) {
    $date_time=$faker->date." ".$faker->time;
    return [
        //
        'content'=>$faker->text(),
        'created_at'=>$date_time,
        'updated_at'=>$date_time,
>>>>>>> user-statuses
    ];
});
