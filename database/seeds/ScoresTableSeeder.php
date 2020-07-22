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
        $count = \App\Drama::count();
        for($drama_id=1; $drama_id <= $count; $drama_id++){
            if(\App\Drama::find($drama_id)->reviews()->avg('total_evaluation') !== null){
                $socre = new \App\Score([
                    'drama_id' => $drama_id,
                    'average_total_evaluation' => \App\Drama::find($drama_id)->reviews()->avg('total_evaluation'),
                    'median_total_evaluation' => \App\Drama::find($drama_id)->reviews()->get()->median('total_evaluation'),
                    'average_story_evaluation' => \App\Drama::find($drama_id)->reviews()->avg('story_evaluation'),
                    'average_world_evaluation' => \App\Drama::find($drama_id)->reviews()->avg('world_evaluation'),
                    'average_cast_evaluation' => \App\Drama::find($drama_id)->reviews()->avg('cast_evaluation'),
                    'average_char_evaluation' => \App\Drama::find($drama_id)->reviews()->avg('char_evaluation'),
                    'average_visual_evaluation' => \App\Drama::find($drama_id)->reviews()->avg('visual_evaluation'),
                    'average_music_evaluation' => \App\Drama::find($drama_id)->reviews()->avg('music_evaluation'),
                    'reviews' => \App\Drama::find($drama_id)->reviews()->count('total_evaluation'),
                    'registers' => \App\Drama::find($drama_id)->reviews()->count(),
                    'favorites' => \App\Drama::find($drama_id)->favorites()->where('favorite', 1)->count(),
                    //総合ランキングは保留
                    'rank_average_total_evaluation' => '1',
                    'previous_require' => \App\Drama::find($drama_id)->reviews()->where('previous', 2)->count(),
                    'previous_better' => \App\Drama::find($drama_id)->reviews()->where('previous', 1)->count(),
                    'previous_no' => \App\Drama::find($drama_id)->reviews()->where('previous', 0)->count() 
                ]);
            }else{
                $socre = new \App\Score([
                    'drama_id' => $drama_id,
                    'reviews' => \App\Drama::find($drama_id)->reviews()->count('total_evaluation'),
                    'registers' => \App\Drama::find($drama_id)->reviews()->count(),
                    'favorites' => \App\Drama::find($drama_id)->favorites()->where('favorite', 1)->count(),
                    //総合ランキングは保留
                    'rank_average_total_evaluation' => '1',
                    'previous_require' => \App\Drama::find($drama_id)->reviews()->where('previous', 2)->count(),
                    'previous_better' => \App\Drama::find($drama_id)->reviews()->where('previous', 1)->count(),
                    'previous_no' => \App\Drama::find($drama_id)->reviews()->where('previous', 0)->count() 
                ]);
            }
            $socre->save();
        }
    }
}
