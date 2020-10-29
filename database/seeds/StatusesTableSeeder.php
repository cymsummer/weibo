<?php

use Illuminate\Database\Seeder;
<<<<<<< HEAD

=======
use  App\Models\Status;
use  App\Models\User;
>>>>>>> user-statuses
class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
<<<<<<< HEAD
        $statuses=factory(\App\Models\Status::class)->times(100)->create();
=======
        $user_ids=['1','2','3'];
        $faker=app(Faker\Generator::class);
        $statuses=factory(Status::class)->times(100)->make()->each(function ($status) use($faker,$user_ids){
            $status->user_id=$faker->randomElement($user_ids);
        });
        Status::insert($statuses->toArray());
>>>>>>> user-statuses
    }
}
