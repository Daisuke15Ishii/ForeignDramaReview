<?php

use Illuminate\Database\Seeder;

class DramaJanreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //レコード1
        $dramaJanre = new \App\DramaJanre([
            'drama_id' => '1',
            'janre_id' => '1'
        ]);
        $dramaJanre->save();
        
        //レコード2
        $dramaJanre = new \App\DramaJanre([
            'drama_id' => '1',
            'janre_id' => '2'
        ]);
        $dramaJanre->save();

        //レコード3
        $dramaJanre = new \App\DramaJanre([
            'drama_id' => '1',
            'janre_id' => '3'
        ]);
        $dramaJanre->save();

        //レコード4
        $dramaJanre = new \App\DramaJanre([
            'drama_id' => '1',
            'janre_id' => '4'
        ]);
        $dramaJanre->save();

        //レコード5
        $dramaJanre = new \App\DramaJanre([
            'drama_id' => '2',
            'janre_id' => '1'
        ]);
        $dramaJanre->save();
        
        //レコード6
        $dramaJanre = new \App\DramaJanre([
            'drama_id' => '2',
            'janre_id' => '2'
        ]);
        $dramaJanre->save();

        //レコード7
        $dramaJanre = new \App\DramaJanre([
            'drama_id' => '3',
            'janre_id' => '1'
        ]);
        $dramaJanre->save();
        
        //レコード8
        $dramaJanre = new \App\DramaJanre([
            'drama_id' => '3',
            'janre_id' => '3'
        ]);
        $dramaJanre->save();


    }
}
