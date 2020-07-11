<?php

use Illuminate\Database\Seeder;

class JanresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //レコード1
        $janre = new \App\Janre([
            'janre' => '犯罪'
        ]);
        $janre->save();
        
        //レコード2
        $janre = new \App\Janre([
            'janre' => 'サスペンス'
        ]);
        $janre->save();
        
        //レコード3
        $janre = new \App\Janre([
            'janre' => 'コメディ'
        ]);
        $janre->save();
        
        //レコード4
        $janre = new \App\Janre([
            'janre' => '刑事'
        ]);
        $janre->save();
        



    }
}
