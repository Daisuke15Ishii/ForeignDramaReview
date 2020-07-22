<?php

namespace App\Http\Controllers\drama\dramaID\review\reviewID;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Drama;
use App\Review;
use App\User;
use App\Score;
use App\Favorite;
use App\Like;
use Auth;

class DramaIDReviewReviewIDController extends Controller
{
    public function add(Request $request){
        //画面表示確認のため仮設定
        $drama = Drama::where('id', 1)->first();
        return view('drama.dramaID.review.create', ['drama' => $drama]);
    }
    
    public function create(Request $request){
        //画面表示確認のため仮設定
        $drama = Drama::where('id', 1)->first();
        return view('drama.dramaID.index', ['drama' => $drama]);
    }
    
    public function index(Request $request){
        //メモ
        return redirect('admin/news');
    }
    
    public function edit(Request $request, $review_id, $drama_id){
        //メモ
        $review = Review::find($request->review_id);
        if(empty($review)){
            abort(404);
        }
        $drama = Drama::where('id', $review->drama()->first()->id)->first();
        return view('drama.dramaID.review.reviewID.edit',  ['drama' => $drama, 'review' => $review]);
    }
    
    public function update(Request $request, $review_id, $drama_id){
        //DramaIDReviewControllerのcreateメソッドとほぼ同じ
        //画面表示確認のため仮設定,とりあえず設定を色々終えているdramaID.indexへ飛ばす
        
        $this->validate($request, Review::$rules);
        //Favoriteモデルのバリデーションをかけるのがフォームの構造上難しい。とりあえず保留
        
        $review = Review::find($request->review_id);
        $favorite = Favorite::where('user_id', $request->user_id)->where('drama_id', $request->drama_id)->first();
        $form = $request->all();
        if(empty($request['review_title'])){
            unset($request['spoiler_alert']);
            unset($request['previous']);
        }

        unset($form['_token']);
        
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
                //未視聴
                $favorite->want = 1;
                break;
            case 2:
                //視聴断念
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
            $favorite->favorite = 1;
        }

        // 今はcommentの入力フォームなし
//        $favorite->comment = $request->comment;

        $review->save();
        $favorite->save();

        return redirect(route('dramaID_index', ['drama_id' => $request->drama_id]));
        
//        $drama = Drama::where('id', 1)->first();
//        return view('drama.dramaID.index', ['drama' => $drama]);
    }
    
    public function delete(Request $request){
        //メモ
        return redirect('admin/news');
    }
}
