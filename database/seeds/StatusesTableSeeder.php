<?php

use Illuminate\Database\Seeder;
use  App\Models\Statuses;
use  App\Models\User;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses=factory(\App\Models\Statuses::class)->times(100)->create();
    }
}
