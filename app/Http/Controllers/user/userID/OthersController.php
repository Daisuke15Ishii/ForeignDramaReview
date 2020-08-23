<?php

namespace App\Http\Controllers\user\userID;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use App\Follow;
use App\Like;

class OthersController extends Controller
{
    public function index(Request $request, $userID){
        //他ユーザーページトップを表示するアクション
        $others = User::where('id', $userID)->first();
        $dramas = $others->favoritesDrama()->get(); //マイページ登録されている作品
        $reviews = $others->reviews()->get(); //レビュー投稿した作品。
        return view('user.userID.index', ['others' => $others, 'reviews' => $reviews]);
    }
    
    public function likeindex(Request $request, $userID){
        //他ユーザーが「いいねしたレビュー一覧」を表示するアクション
        $others = User::where('id', $userID)->first();
        $likes = Like::where('user_id', $others->id); //auth::userがしたいいね

        //いいねした順に並び変え
        $likes = $likes->orderby('updated_at', 'desc');

        $alllikes = $likes->count();
        $likes = $likes->Paginate(20);
        
        return view('user.userID.likeindex', ['others' => $others, 'likes' => $likes, 'alllikes' => $alllikes]);
    }

    public function follow(Request $request){
        //DramaIDReviewReviewIDControllerのfollowメソッドとほぼ同じ(向こうは削除してこっちに統一した方が良いかも)
        $form = $request->all();

        //ユーザーをfollowしたときの処理
        if($request->follow == 'フォロー'){
            $this->validate($request, Follow::$rules);
            $follow = new Follow;

            $follow->user_id = $request->user_id;
            $follow->following_user_id = $request->following_user_id;
            
            $follow->save();
            return back();
        }else{
            //ユーザーのfollowを解除したときの処理
            $follow = Follow::where('user_id', $request->user_id)->where('following_user_id', $request->following_user_id)->first();
            $follow->delete();

            return back();
        }
    }
    
    public function followingindex(Request $request, $userID){
        //「フォロー中のユーザー一覧」を表示するアクション
        $others = User::where('id', $userID)->first();
        $followings = Follow::where('user_id', $userID); //フォロー中のユーザー

        //フォローした順に並び変え
        $followings = $followings->orderby('created_at', 'desc');

        $allfollowings = $followings->count();
        $followings = $followings->Paginate(20);
        
        return view('user.userID.followingindex', ['others' => $others, 'followings' => $followings, 'allfollowings' => $allfollowings]);
    }
    
    public function followedindex(Request $request, $userID){
        //「フォロワーのユーザー一覧」を表示するアクション
        $others = User::where('id', $userID)->first();
        $followers = Follow::where('following_user_id', $userID); //フォロワー

        //フォローされた順に並び変え
        $followers = $followers->orderby('created_at', 'desc');

        $allfollowers = $followers->count();
        $followers = $followers->Paginate(20);
        
        return view('user.userID.followedindex', ['others' => $others, 'followers' => $followers, 'allfollowers' => $allfollowers]);
    }
}
