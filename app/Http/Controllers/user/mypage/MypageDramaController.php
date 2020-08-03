<?php

namespace App\Http\Controllers\user\mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Favorite;
use App\Score;
use App\Drama;
use App\Review;
use Auth;

class MypageDramaController extends Controller
{
    public function index(Request $request, $categorize){
        //作品一覧を表示する(すべて、未視聴、視聴中、視聴断念、視聴済、未分類)。
        //お気に入り作品一覧は同コントローラの別アクションにて処理
        $auth = \Auth::user();
        $reviews = $auth->reviews(); //レビュー投稿した作品。
        
        //caseにより「すべて」「未視聴」「視聴中」「視聴済」「視聴断念」「未分類」に分岐させる
        switch($categorize){
            case "uncategorized":
                //未分類
                $reviews = $reviews->where('progress', '0');
                $title = "未分類の作品";
                $categorize = 'uncategorized';
                break;
            case "wantto":
                //未視聴
                $reviews = $reviews->where('progress', '1');
                $title = "未視聴の作品";
                $categorize = 'wantto';
                break;
            case "stop":
                //視聴断念
                $reviews = $reviews->where('progress', '2');
                $title = "視聴断念の作品";
                $categorize = 'stop';
                break;
            case "watching":
                //視聴中
                $reviews = $reviews->where('progress', '3');
                $title = "視聴中の作品";
                $categorize = 'watching';
                break;
            case "watched":
                //視聴済
                $reviews = $reviews->where('progress', '4');
                $title = "視聴済の作品";
                $categorize = 'watched';
                break;
            case "all":
                //すべて
                $title = "すべての作品";
                $categorize = 'all';
                break;
        }

        //sorts(checkbox)によってレビュー表示の条件を絞る
        if ($request->sorts != '') {
            $sorts = $request->sorts;
            foreach($request->sorts as $sort){
                // チェックがあれば絞り込み条件に追加。
                switch($sort){
                    case "not_review_total_evaluation":
                        //未評価のみ検索
                        $reviews = $reviews->whereNull('total_evaluation');
                        break;
                    case "review_total_evaluation":
                        //評価済のみ検索
                        $reviews = $reviews->whereNotNull('total_evaluation');
                        break;
                    case "not_review_comment":
                        //レビューコメントなしのみ検索
                        $reviews = $reviews->whereNull('review_comment');
                        break;
                    case "review_comment":
                        //レビューコメント有のみ検索
                        $reviews = $reviews->whereNotNull('review_comment');
                        break;
                    case "favorite":
                        //お気に入り以外のみ検索
                        $reviews = $reviews->whereHas('favorite', function($q){
                            $q->where('favorite', '0');
                        });
                        break;
                }
            }
        }else{
            //全て未チェック(requestにsortsなし)時の「in_array」エラー回避のため記述
            $sorts = array(-1);
        }

        //sortbyの値に応じて並び変え
        if ($request->sortby != '') {
            $sortby = $request->sortby;
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
                /* innerjoinを利用すると同カラム名が複数存在して、viewにて一部エラーとなるため保留。
                case "title_asc":
                    //タイトル昇順
                    $reviews = $reviews->join('dramas', 'dramas.id', '=', 'reviews.drama_id')->orderBy('title', 'asc');
                    break;
                case "title_asc":
                    //タイトル降順
                    $reviews = $reviews->join('dramas', 'dramas.id', '=', 'reviews.drama_id')->orderBy('title', 'desc');
                    break;
                */
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
            $sortby = -1;
        }
        
        $allreviews = $reviews->count();
        //後程paginate(20)に変更予定
        $reviews = $reviews->Paginate(8);
        
        return view('user.mypage.drama.index', ['reviews' => $reviews, 'allreviews' => $allreviews, 'title' => $title, 'categorize' => $categorize, 'sorts' => $sorts, 'sortby' => $sortby]);
    }

    public function indexfavorite(Request $request){
        //お気に入り作品一覧を表示するアクション
        $auth = \Auth::user();
        $reviews = $auth->reviews()->wherehas('favorite', function($q){
            $q->where('favorite', '1');
        }); //お気に入り登録した作品

        //sorts(checkbox)によってレビュー表示の条件を絞る
        if ($request->sorts != '') {
            $sorts = $request->sorts;
            foreach($request->sorts as $sort){
                // チェックがあれば絞り込み条件に追加。
                switch($sort){
                    case "review_total_evaluation":
                        //未評価のみ検索
                        $reviews = $reviews->whereNull('total_evaluation');
                        break;
                    case "review_comment":
                        //レビューコメントなしのみ検索
                        $reviews = $reviews->whereNull('review_comment');
                        break;
                }
            }
        }else{
            //全て未チェック(requestにsortsなし)時の「in_array」エラー回避のため記述
            $sorts = array(-1);
        }

        //sortbyの値に応じて並び変え
        if ($request->sortby != '') {
            $sortby = $request->sortby;
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
                /* innerjoinを利用すると同カラム名が複数存在して、viewにて一部エラーとなるため保留。
                case "title_asc":
                    //タイトル昇順
                    $reviews = $reviews->join('dramas', 'dramas.id', '=', 'reviews.drama_id')->orderBy('title', 'asc');
                    break;
                case "title_asc":
                    //タイトル降順
                    $reviews = $reviews->join('dramas', 'dramas.id', '=', 'reviews.drama_id')->orderBy('title', 'desc');
                    break;
                */
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
            //初期値は「総合評価が高い順」
            $reviews = $reviews->orderBy('total_evaluation', 'desc');
            $sortby = "total_evaluation_desc";
        }

        $allreviews = $reviews->count();
        //後程paginate(10)に変更予定
        $reviews = $reviews->Paginate(5);
        
        return view('user.mypage.drama.favorite.index', ['reviews' => $reviews, 'allreviews' => $allreviews, 'sorts' => $sorts, 'sortby' => $sortby]);
    }

    public function setfavorite(Request $request){
        //お気に入り登録するアクション
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
        //マイページへ作品登録するアクション
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
        //レビュー削除(マイページから除外)するアクション
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
        $score->previous_require = Drama::find($request->drama_id)->reviews()->where('previous', 2)->count();
        $score->previous_better = Drama::find($request->drama_id)->reviews()->where('previous', 1)->count();
        $score->previous_no = Drama::find($request->drama_id)->reviews()->where('previous', 0)->count();

        $score->save();


        //総合ランキングを再計算
        $ss = \App\Score::orderby('average_total_evaluation', 'desc')->get();
        $i = 1; //順位
        foreach($ss as $s){
            $s->rank_average_total_evaluation = $i;
            $s->save();
            $i++;
        }

        return back();
    }
}
