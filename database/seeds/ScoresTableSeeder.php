<?php

use Illuminate\Database\Seeder;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //表示確認テスト用にシーダーからデータを仮入力
        //レコード1
        $score = new \App\Score([
            'drama_id' => '1',
            'average_total_evaluation' => '90',
            'median_total_evaluation' => '80',
            'average_story_evaluation' => '4',
            'average_world_evaluation' => '4',
            'average_cast_evaluation' => '4',
            'average_char_evaluation' => '4',
            'average_visual_evaluation' => '4',
            'average_music_evaluation' => '4',
            'reviews' => '7',
            'registers' => '10',
            'favorites' => '3',
            'rank_average_total_evaluation' => '1',
            'previous_require' => '2',
            'previous_better' => '4',
            'previous_no' => '1'
            
        ]);
        $score->save();

    }
}
