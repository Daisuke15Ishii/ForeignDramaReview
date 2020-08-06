<?php

namespace App\Http\Controllers\drama\dramaID\review;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Drama;
use App\Review;
use App\User;
use App\Score;
use App\Favorite;
use App\Like;
use Auth;

class DramaIDReviewController extends Controller
{
    public function add(Request $request, $drama_id){
        //レビュー投稿画面へ遷移
        $drama = Drama::where('id', $drama_id)->first();
        return view('drama.dramaID.review.create', ['drama' => $drama]);
    }
    
    public function create(Request $request){
        //レビューを初投稿
        
        $this->validate($request, Review::$rules);
        //Favoriteモデルのバリデーションをかけるのがフォームの構造上難しい。とりあえず保留
        
        $review = new Review;
        $favorite = new Favorite;
        $form = $request->all();
        if(empty($request['review_title'])){
            unset($request['spoiler_alert']);
            unset($request['previous']);
        }

        unset($form['_token']);
        
        $review->user_id = $request->user_id;
        $review->drama_id = $request->drama_id;
        $review->score_id = $request->score_id;
        $review->total_evaluation = $request->total_evaluation;
        $review->story_evaluation = $request->story_evaluation;
        $review->world_evaluation = $request->world_evaluation;
        $review->cast_evaluation = $request->cast_evaluation;
        $review->char_evaluation = $request->char_evaluation;
        $review->visual_evaluation = $request->visual_evaluation;
        $review->music_evaluation = $request->music_evaluation;
        $review->progress = $request->progress;
        $review->subtitles = $request->subtitles;
        $review->review_title = $request->review_title;
        $review->review_comment = $request->review_comment;
        $review->spoiler_alert = $request->spoiler_alert;
        $review->previous = $request->previous;

        $favorite->user_id = $request->user_id;
        $favorite->drama_id = $request->drama_id;

        //視聴状況を初期化後、フォーム値を更新
        $favorite->want = 0;
        $favorite->watching = 0;
        $favorite->watched = 0;
        $favorite->stop = 0;
        $favorite->uncategorized = 0;
        switch($request['progress']){
            case 0:
                //未分類
                $favorite->uncategorized = 1;
                break;
            case 1:
                //観たい
                $favorite->want = 1;
                break;
            case 2:
                //リタイア
                $favorite->stop = 1;
                break;
            case 3:
                //視聴中
                $favorite->watching = 1;
                break;
            case 4:
                //視聴済
                $favorite->watched = 1;
                break;
        }

        if(empty($request['favorite'])){
            $favorite->favorite = 0;
        }else{
            $favorite->favorite = $request->favorite;
        }

//        今はcommentの入力フォームなし
//        $favorite->comment = $request->comment;

        $review->save();
        $favorite->review_id = $review->id;
        $favorite->save();

        //scoreテーブルの集計値を保存
        if(Score::where('drama_id', $request->drama_id)->count() == 0){
            $score = new Score;
            $score->drama_id = $request->drama_id;
            
            $score->average_total_evaluation = $request->total_evaluation;
            $score->median_total_evaluation = $request->total_evaluation;
            $score->average_story_evaluation = $request->story_evaluation;
            $score->average_story_evaluation = $request->music_evaluation;
            $score->average_world_evaluation = $request->world_evaluation;
            $score->average_cast_evaluation = $request->cast_evaluation;
            $score->average_char_evaluation = $request->char_evaluation;
            $score->average_visual_evaluation = $request->visual_evaluation;
            $score->average_music_evaluation = $request->music_evaluation;
            $score->reviews = 1;
            $score->registers = Drama::find($request->drama_id)->reviews()->count();
            $score->favorites = Drama::find($request->drama_id)->favorites()->where('favorite', 1)->count();
            //総合ランキングは一番最後に別途処理(default=0)
            $score->previous_require = Drama::find($request->drama_id)->reviews()->where('previous', 2)->count();
            $score->previous_better = Drama::find($request->drama_id)->reviews()->where('previous', 1)->count();
            $score->previous_no = Drama::find($request->drama_id)->reviews()->where('previous', 0)->count();
        }else{
            $score = Score::where('drama_id', $request->drama_id)->first();

            $score->average_total_evaluation = Drama::find($request->drama_id)->reviews()->avg('total_evaluation');
            $score->median_total_evaluation = Drama::find($request->drama_id)->reviews()->get()->median('total_evaluation');
            $score->average_story_evaluation = Drama::find($request->drama_id)->reviews()->avg('story_evaluation');
            $score->average_world_evaluation = Drama::find($request->drama_id)->reviews()->avg('world_evaluation');
            $score->average_cast_evaluation = Drama::find($request->drama_id)->reviews()->avg('cast_evaluation');
            $score->average_char_evaluation = Drama::find($request->drama_id)->reviews()->avg('char_evaluation');
            $score->average_visual_evaluation = Drama::find($request->drama_id)->reviews()->avg('visual_evaluation');
            $score->average_music_evaluation = Drama::find($request->drama_id)->reviews()->avg('music_evaluation');
            $score->reviews = Drama::find($request->drama_id)->reviews()->count('total_evaluation');
            $score->registers = Drama::find($request->drama_id)->reviews()->count();
            $score->favorites = Drama::find($request->drama_id)->favorites()->where('favorite', 1)->count();
            //総合ランキングは一番最後に別途処理
            $score->previous_require = Drama::find($request->drama_id)->reviews()->where('previous', 2)->count();
            $score->previous_better = Drama::find($request->drama_id)->reviews()->where('previous', 1)->count();
            $score->previous_no = Drama::find($request->drama_id)->reviews()->where('previous', 0)->count();
        }
        $score->save();

        //総合ランキングを再計算
        $ss = \App\Score::orderby('average_total_evaluation', 'desc')->get();
        $i = 1; //順位
        foreach($ss as $s){
            $s->rank_average_total_evaluation = $i;
            $s->save();
            $i++;
        }

        return redirect(route('dramaID_index', ['drama_id' => $request->drama_id]));
    }
}
