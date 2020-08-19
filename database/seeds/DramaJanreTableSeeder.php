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
/*
        //レコードを個別に入れるなら下記の通り
        $dramaJanre = new \App\DramaJanre([
            'drama_id' => '1',
            'janre_id' => '1'
        ]);
        $dramaJanre->save();
*/        
        
        //ブレイキング・バッド(drama_id=1~5)(janre=1,19,20,21,26)
        for($home_id=1; $home_id < 6; $home_id++){
            $dramaJanre = new \App\DramaJanre([
                'drama_id' => $home_id,
                'janre_id' => '1'
            ]);
            $dramaJanre->save();

            $dramaJanre = new \App\DramaJanre([
                'drama_id' => $home_id,
                'janre_id' => '19'
            ]);
            $dramaJanre->save();

            $dramaJanre = new \App\DramaJanre([
                'drama_id' => $home_id,
                'janre_id' => '20'
            ]);
            $dramaJanre->save();
            
            $dramaJanre = new \App\DramaJanre([
                'drama_id' => $home_id,
                'janre_id' => '21'
            ]);
            $dramaJanre->save();

            $dramaJanre = new \App\DramaJanre([
                'drama_id' => $home_id,
                'janre_id' => '26'
            ]);
            $dramaJanre->save();
        }

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
