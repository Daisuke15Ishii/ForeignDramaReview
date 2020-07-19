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


        //ホームランド(drama_id=6~12)(janre=1,2,21)
        for($home_id=6; $home_id < 13; $home_id++){
            $dramaJanre = new \App\DramaJanre([
                'drama_id' => $home_id,
                'janre_id' => '1'
            ]);
            $dramaJanre->save();

            $dramaJanre = new \App\DramaJanre([
                'drama_id' => $home_id,
                'janre_id' => '2'
            ]);
            $dramaJanre->save();

            $dramaJanre = new \App\DramaJanre([
                'drama_id' => $home_id,
                'janre_id' => '21'
            ]);
            $dramaJanre->save();
        }
        
        //ゲームオブスローンズ(drama_id=13~20)(janre=12,13,18,23,24)
        for($game_id=13; $game_id < 21; $game_id++){
            $dramaJanre = new \App\DramaJanre([
                'drama_id' => $game_id,
                'janre_id' => '12'
            ]);
            $dramaJanre->save();

            $dramaJanre = new \App\DramaJanre([
                'drama_id' => $game_id,
                'janre_id' => '13'
            ]);
            $dramaJanre->save();
            
            $dramaJanre = new \App\DramaJanre([
                'drama_id' => $game_id,
                'janre_id' => '18'
            ]);
            $dramaJanre->save();
            
            $dramaJanre = new \App\DramaJanre([
                'drama_id' => $game_id,
                'janre_id' => '23'
            ]);
            $dramaJanre->save();
            
            $dramaJanre = new \App\DramaJanre([
                'drama_id' => $game_id,
                'janre_id' => '24'
            ]);
            $dramaJanre->save();
        }
    }
}
