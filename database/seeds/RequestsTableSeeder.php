<?php

use Illuminate\Database\Seeder;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //レコード1
        $request = new \App\Request([
            'user_id' => '2',
            'title' => 'ブレイキング・バッド',
            'season' => '1',
            'cast' => 'ブライアン・クランストン',
            'country' => 'アメリカ',
            'onair' => '2008',
            'url' => 'https://ja.wikipedia.org/wiki/ブレイキング・バッド',
            'comment' => '追加希望します。'
        ]);
        $request->save();

        //レコード2
        $request = new \App\Request([
            'user_id' => '2',
            'title' => 'ブレイキング・バッド',
            'season' => '2',
            'cast' => 'ブライアン・クランストン',
            'country' => 'アメリカ',
            'onair' => '2008',
            'url' => 'https://ja.wikipedia.org/wiki/ブレイキング・バッド',
            'comment' => '追加希望します。'
        ]);
        $request->save();

        //レコード3
        $request = new \App\Request([
            'user_id' => '2',
            'title' => 'ブレイキング・バッド',
            'season' => '3',
            'cast' => 'ブライアン・クランストン',
            'country' => 'アメリカ',
            'onair' => '2008',
            'url' => 'https://ja.wikipedia.org/wiki/ブレイキング・バッド',
            'comment' => '追加希望します。'
        ]);
        $request->save();

        //レコード4
        $request = new \App\Request([
            'user_id' => '1',
            'title' => 'ブレイキング・バッド',
            'season' => '5',
            'cast' => 'ブライアン・クランストン',
            'country' => 'アメリカ',
            'onair' => '2008',
            'url' => 'https://ja.wikipedia.org/wiki/ブレイキング・バッド',
            'comment' => '追加希望します。'
        ]);
        $request->save();


    }
}
