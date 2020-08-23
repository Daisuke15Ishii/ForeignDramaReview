<?php

namespace App\Http\Controllers\user\userID;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Favorite;
use App\Score;
use App\Drama;
use App\Review;
use Auth;
use App\User;


class OthersDramaController extends Controller
{
    public function index(Request $request, $userID, $categorize){
        //作品一覧を表示する(すべて、観たい、視聴中、リタイア、視聴済、未分類)。
        //お気に入り作品一覧は同コントローラの別アクションにて処理
        $others = User::where('id', $userID)->first();
        $reviews = $others->reviews(); //レビュー投稿した作品。
        
        //caseにより「すべて」「観たい」「視聴中」「視聴済」「リタイア」「未分類」に分岐させる
        switch($categorize){
            case "uncategorized":
                //未分類
                $reviews = $reviews->where('progress', '0');
                $title = "未分類の作品";
                $categorize = 'uncategorized';
                break;
            case "wantto":
                //観たい
                $reviews = $reviews->where('progress', '1');
                $title = "観たい作品";
                $categorize = 'wantto';
                break;
            case "stop":
                //リタイア
                $reviews = $reviews->where('progress', '2');
                $title = "リタイアした作品";
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
        $reviews = $reviews->Paginate(20);
        
        return view('user.userID.drama.index', ['others' => $others, 'reviews' => $reviews, 'allreviews' => $allreviews, 'title' => $title, 'categorize' => $categorize, 'sorts' => $sorts, 'sortby' => $sortby]);
    }
    
    public function indexfavorite(Request $request, $userID){
        //お気に入り作品一覧を表示するアクション
        $others = User::where('id', $userID)->first();
        $reviews = $others->reviews()->wherehas('favorite', function($q){
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
        $reviews = $reviews->Paginate(10);
        
        return view('user.userID.drama.favorite.index', ['others' => $others, 'reviews' => $reviews, 'allreviews' => $allreviews, 'sorts' => $sorts, 'sortby' => $sortby]);
    }
}
