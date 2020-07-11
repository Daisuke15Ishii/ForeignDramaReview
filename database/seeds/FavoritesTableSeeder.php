<?php

use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //レコード1
        $favorite = new \App\Favorite([
            'drama_id' => '1',
            'user_id' => '2',
            'watched' => '1',
            'uncategorized' => '0',
            'favorite' => '1',
            'comment' => '一言コメントのテストほげ'
        ]);
        $favorite->save();

        //レコード2
        $favorite = new \App\Favorite([
            'drama_id' => '1',
            'user_id' => '1',
            'watching' => '1',
            'uncategorized' => '0',
            'favorite' => '1',
            'comment' => '一言コメントのテストほげほげ'
        ]);
        $favorite->save();

        //レコード3
        $favorite = new \App\Favorite([
            'drama_id' => '2',
            'user_id' => '2',
            'watching' => '1',
            'uncategorized' => '0',
            'favorite' => '1',
            'comment' => '一言コメントのテストほげほげ'
        ]);
        $favorite->save();

        //レコード4
        $favorite = new \App\Favorite([
            'drama_id' => '3',
            'user_id' => '2',
            'watching' => '1',
            'uncategorized' => '0',
            'favorite' => '1',
            'comment' => '一言コメントのテストほげほげ'
        ]);
        $favorite->save();

        //レコード5
        $favorite = new \App\Favorite([
            'drama_id' => '4',
            'user_id' => '2',
            'watching' => '1',
            'uncategorized' => '0',
            'favorite' => '1',
            'comment' => '一言コメントのテストほげほげ'
        ]);
        $favorite->save();

        //レコード6
        $favorite = new \App\Favorite([
            'drama_id' => '5',
            'user_id' => '2',
            'watching' => '1',
            'uncategorized' => '0',
            'favorite' => '1',
            'comment' => '一言コメントのテストほげほげ'
        ]);
        $favorite->save();

    }
}
