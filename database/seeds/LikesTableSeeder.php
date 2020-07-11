<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //レコード1
        $like = new \App\Like([
            'user_id' => '1',
            'review_id' => '1'
        ]);
        $like->save();
        
        //レコード2
        $like = new \App\Like([
            'user_id' => '2',
            'review_id' => '2'
        ]);
        $like->save();

        //レコード3
        $like = new \App\Like([
            'user_id' => '1',
            'review_id' => '3'
        ]);
        $like->save();
        
    }
}
