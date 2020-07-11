<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //レコード1
        $follow = new \App\Follow([
            'user_id' => '1',
            'following_user_id' => '2'
        ]);
        $follow->save();
        
        //レコード2
        $follow = new \App\Follow([
            'user_id' => '2',
            'following_user_id' => '1'
        ]);
        $follow->save();

    }
}
