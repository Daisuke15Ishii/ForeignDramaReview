<?php

namespace App\Http\Controllers\user\mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Favorite;
use App\Score;
use App\Drama;


class MypageDramaController extends Controller
{
    //
    public function add(){
        //メモ
        return view('admin.news.create');
    }
    
    public function create(Request $request){
        //メモ
        return redirect('admin/news/create');
    }

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
        
        $allreviews = $reviews->get();
        //後程paginate(20)に変更予定
        $reviews = $reviews->Paginate(8);
        
        return view('user.mypage.drama.index', ['reviews' => $reviews, 'allreviews' => $allreviews]);
    }

    public function edit(Request $request){
        //メモ
        return view('admin.news.edit',  ['news_form' => $news]);
    }
    
    public function update(Request $request){
        //メモ
        return redirect('admin/news');
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
    
    public function delete(Request $request){
        //メモ
        return redirect('admin/news/');
    }
}
