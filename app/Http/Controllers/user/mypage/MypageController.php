<?php

namespace App\Http\Controllers\user\mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Like;
use App\Review;

class MypageController extends Controller
{
    public function index(Request $request){
        //マイページトップを表示するアクション
        $auth = \Auth::user();
        $dramas = $auth->favoritesDrama()->get(); //マイページ登録されている作品
        $reviews = $auth->reviews()->get(); //レビュー投稿した作品。これはviewに渡す必要ないかも
        return view('user.mypage.index', ['reviews' => $reviews]);
    }
    
    public function likeindex(Request $request){
        //「いいねしたレビュー一覧」を表示するアクション
        $auth = \Auth::user();
        $reviews = Review::wherehas('likes', function($q){
            $q->where('user_id', \Auth::id());
        }); //auth::userがいいねしたレビュー


        //sorts(checkbox)によってレビュー表示の条件を絞る
        //全て未チェック(requestにsortsなし)時の「in_array」エラー回避のため記述
        $sorts = array(-1);

        //sortbyの値に応じて並び変え

//        $reviews = Review::join('likes', 'likes.review_id', '=', 'reviews.id')->where('likes.user_id', \Auth::id())->orderBy('likes.id', 'desc');
        $sortby = -1;
        
        $allreviews = $reviews->count();
        //後程paginate(10)に変更予定
        $reviews = $reviews->Paginate(10);
        
        return view('user.mypage.likeindex', ['reviews' => $reviews, 'allreviews' => $allreviews, 'sorts' => $sorts, 'sortby' => $sortby]);
    }
}
