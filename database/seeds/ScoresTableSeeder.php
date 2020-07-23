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
        //表示確認テスト用にシーダーからデータを更新(何度でもdb:seed可能)
        $dramas = \App\Drama::all();
        foreach($dramas as $drama){
            if($drama->score() !== null){
                //既にscoreレコードが存在するとき
                $socre = $drama->score()->first();
                $socre->reviews = $drama->reviews()->count('total_evaluation');
                $socre->registers = $drama->reviews()->count();
                $socre->favorites = $drama->favorites()->where('favorite', 1)->count();
                //総合ランキングは保留
                $socre->rank_average_total_evaluation = '1';
                $socre->previous_require = $drama->reviews()->where('previous', 2)->count();
                $socre->previous_better = $drama->reviews()->where('previous', 1)->count();
                $socre->previous_no = $drama->reviews()->where('previous', 0)->count();
                
                //総合評価のレビュー投稿が1つ以上あるとき
                if($drama->reviews()->avg('total_evaluation') !== null){
                    $socre->average_total_evaluation = $drama->reviews()->avg('total_evaluation');
                    $socre->median_total_evaluation = $drama->reviews()->get()->median('total_evaluation');
                    $socre->average_story_evaluation = $drama->reviews()->avg('story_evaluation');
                    $socre->average_world_evaluation = $drama->reviews()->avg('world_evaluation');
                    $socre->average_cast_evaluation = $drama->reviews()->avg('cast_evaluation');
                    $socre->average_char_evaluation = $drama->reviews()->avg('char_evaluation');
                    $socre->average_visual_evaluation = $drama->reviews()->avg('visual_evaluation');
                    $socre->average_music_evaluation = $drama->reviews()->avg('music_evaluation');
                }
            }else{
                //scoreレコードが存在しないとき
                if($drama->reviews()->avg('total_evaluation') !== null){
                    //総合評価のレビュー投稿が1つ以上あるとき
                    $socre = new \App\Score([
                        'drama_id' => $drama->id,
                        'average_total_evaluation' => $drama->reviews()->avg('total_evaluation'),
                        'median_total_evaluation' => $drama->reviews()->get()->median('total_evaluation'),
                        'average_story_evaluation' => $drama->reviews()->avg('story_evaluation'),
                        'average_world_evaluation' => $drama->reviews()->avg('world_evaluation'),
                        'average_cast_evaluation' => $drama->reviews()->avg('cast_evaluation'),
                        'average_char_evaluation' => $drama->reviews()->avg('char_evaluation'),
                        'average_visual_evaluation' => $drama->reviews()->avg('visual_evaluation'),
                        'average_music_evaluation' => $drama->reviews()->avg('music_evaluation'),
                        'reviews' => $drama->reviews()->count('total_evaluation'),
                        'registers' => $drama->reviews()->count(),
                        'favorites' => $drama->favorites()->where('favorite', 1)->count(),
                        //総合ランキングは保留
                        'rank_average_total_evaluation' => '1',
                        'previous_require' => $drama->reviews()->where('previous', 2)->count(),
                        'previous_better' => $drama->reviews()->where('previous', 1)->count(),
                        'previous_no' => $drama->reviews()->where('previous', 0)->count() 
                    ]);
                }else{
                    //総合評価のレビュー投稿が1つもないとき(マイページに作品登録しただけ)
                    $socre = new \App\Score([
                        'drama_id' => $drama->id,
                        'reviews' => $drama->reviews()->count('total_evaluation'),
                        'registers' => $drama->reviews()->count(),
                        'favorites' => $drama->favorites()->where('favorite', 1)->count(),
                        //総合ランキングは保留
                        'rank_average_total_evaluation' => '1',
                        'previous_require' => $drama->reviews()->where('previous', 2)->count(),
                        'previous_better' => $drama->reviews()->where('previous', 1)->count(),
                        'previous_no' => $drama->reviews()->where('previous', 0)->count() 
                    ]);
                }
            }
            $socre->save();
        }
    }
}
