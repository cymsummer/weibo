<?php

use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=\App\Models\User::all();
        $user=$users->first();
        $user_id=$user->id;

        //获取去除掉 ID 为1 的所有用户 ID 数组
        $followers=$users->slice(1);
        $followers_ids=$followers->pluck('id')->toArray();

        //关注除了 1 号用户以外的所有用户
        $user->follow($followers_ids);

        //除了1号以外的用户都来关注 1号 用户
        foreach($followers as $follower){
            $follower->follow($user_id);
        }
    }
}
