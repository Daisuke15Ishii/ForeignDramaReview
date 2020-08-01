<?php

namespace App\Http\Controllers\user\mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Favorite;
use App\Score;
use App\Drama;
use App\Review;

class MypageDramaController extends Controller
{
    public function index(Request $request){
        $auth = \Auth::user();
//        $dramas = $auth->favoritesDrama()->get(); //マイページ登録されている作品
        $reviews = $auth->reviews(); //レビュー投稿した作品。
        
        //caseですべて、視聴済、未視聴などを分岐させる
        $reviews = $reviews;
        
        //sortbyの値に応じて並び変え
        if ($request->sortby != '') {
            // 検索されたら絞り込み条件に追加
            switch($request['sortby']){
                case "update_desc":
                    //投稿更新日が新しい順
                    $reviews = $reviews->orderBy('updated_at', 'desc');
                    break;
                case "update_asc":
                    //投稿更新日が古い順
                    $reviews = $reviews->orderBy('updated_at', 'asc');
                    break;
                case "title_asc":
                    //タイトル昇順
                    $reviews = $reviews->join('dramas', 'dramas.id', '=', 'reviews.drama_id')->orderBy('title', 'asc');
                    break;
                case "title_asc":
                    //タイトル降順
                    $reviews = $reviews->join('dramas', 'dramas.id', '=', 'reviews.drama_id')->orderBy('title', 'desc');
                    break;
                case "total_evaluation_desc":
                    //総合評価が高い順
                    $reviews = $reviews->orderBy('total_evaluation', 'desc');
                    break;
                case "total_evaluation_desc":
                    //総合評価が低い順
                    $reviews = $reviews->orderBy('total_evaluation', 'asc');
                    break;
                case "like_desc":
                    //いいねが多い順
                    $reviews = $reviews->withCount('likes')->orderBy('likes_count', 'desc');
                    break;
                case "like_asc":
                    //いいねが少ない順
                    $reviews = $reviews->withCount('likes')->orderBy('likes_count', 'desc');
                    break;
            }
        }else{
            $reviews = $reviews->orderBy('updated_at', 'desc');
        }
        
        $allreviews = $reviews->count();
        //後程paginate(20)に変更予定
        $reviews = $reviews->Paginate(8);
        
        return view('user.mypage.drama.index', ['reviews' => $reviews, 'allreviews' => $allreviews]);
    }

    public function setfavorite(Request $request){
        //お気に入り登録
//        $this->validate($request, Favorite::$rules);
        $favorite = Favorite::where('review_id', $request->review_id)->first();

        if($request->favorite == '1'){
            $favorite->favorite = '1';
        }elseif($request->favorite == '0'){
            $favorite->favorite = '0';
        }
        $favorite->save();

        //scoreテーブルのfavoriteを再集計
        $score = Score::where('drama_id', $request->drama_id)->first();
        $score->favorites = Drama::find($request->drama_id)->favorites()->where('favorite', 1)->count();
        $score->save();

        return back();
    }
    
    public function setdrama(Request $request){
        //マイページへ作品登録する処理
        $this->validate($request, Review::$rules);

        $review = new Review;
        $favorite = new Favorite;

        $review->user_id = $request->user_id;
        $review->drama_id = $request->drama_id;
        $review->score_id = $request->score_id;
        $review->progress = 0; //未分類(初期値0なので入力不要)

        $favorite->user_id = $request->user_id;
        $favorite->drama_id = $request->drama_id;

        $favorite->uncategorized = 1; //未分類(初期値0なので入力不要)

        $review->save();
        $favorite->review_id = $review->id;
        $favorite->save();

        //scoreテーブルのregistersを再集計
        $score = Score::where('drama_id', $request->drama_id)->first();
        $score->registers = Drama::find($request->drama_id)->reviews()->count();
        $score->save();

        return back();
    }
    
    public function delete(Request $request){
        //レビュー削除(マイページから除外)する処理
        $review = Review::where('id', $request->review_id)->first();
        $favorite = Favorite::where('review_id', $request->review_id)->first();
        $review->delete();
        $favorite->delete();

        //scoreテーブルの集計値を保存
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
        //総合ランキングは保留
        $score->previous_require = Drama::find($request->drama_id)->reviews()->where('previous', 2)->count();
        $score->previous_better = Drama::find($request->drama_id)->reviews()->where('previous', 1)->count();
        $score->previous_no = Drama::find($request->drama_id)->reviews()->where('previous', 0)->count();

        $score->save();

        return back();
    }
}
