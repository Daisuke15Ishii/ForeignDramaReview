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
        
        //レコード
        $janre = new \App\Janre([
            'janre' => '医療'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => 'スポーツ'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => '青春'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => 'ミステリー'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => '恋愛'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => '歴史'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => '法廷'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => '戦争'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => '政治'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => '時代劇'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => '仕事'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => 'ミュージカル'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => 'ホラー'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => 'ファンタジー'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => 'ヒューマン'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => '家族'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => 'バイオレンス'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => 'ドキュメンタリー'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => 'アドベンチャー'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => 'アクション'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => 'SF'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => '人生'
        ]);
        $janre->save();
        
        //レコード
        $janre = new \App\Janre([
            'janre' => '学園'
        ]);
        $janre->save();

    }
}
