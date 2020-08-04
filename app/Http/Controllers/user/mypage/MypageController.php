<?php

namespace App\Http\Controllers\user\mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Like;
use App\Review;
use App\Follow;

class MypageController extends Controller
{
    public function index(Request $request){
        //マイページトップを表示するアクション
        $auth = \Auth::user();
        $dramas = $auth->favoritesDrama()->get(); //マイページ登録されている作品
        $reviews = $auth->reviews()->get(); //レビュー投稿した作品。
        return view('user.mypage.index', ['reviews' => $reviews]);
    }
    
    public function likeindex(Request $request){
        //「いいねしたレビュー一覧」を表示するアクション
        $likes = Like::where('user_id', \Auth::id()); //auth::userがしたいいね

        //いいねした順に並び変え
        $likes = $likes->orderby('updated_at', 'desc');

        $alllikes = $likes->count();
        $likes = $likes->Paginate(10);
        
        return view('user.mypage.likeindex', ['likes' => $likes, 'alllikes' => $alllikes]);
    }
    
    public function followingindex(Request $request){
        //「フォロー中のユーザー一覧」を表示するアクション
        $followings = Follow::where('user_id', \Auth::id()); //フォロー中のユーザー

        //フォローした順に並び変え
        $followings = $followings->orderby('created_at', 'desc');

        $allfollowings = $followings->count();
        $followings = $followings->Paginate(10);
        
        return view('user.mypage.followingindex', ['followings' => $followings, 'allfollowings' => $allfollowings]);
    }
    
}
