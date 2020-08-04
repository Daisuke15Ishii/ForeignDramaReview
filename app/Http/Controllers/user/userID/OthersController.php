<?php

namespace App\Http\Controllers\user\userID;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use App\Follow;

class OthersController extends Controller
{
    public function index(Request $request, $userID){
        //他ユーザーページトップを表示するアクション
        $others = User::where('id', $userID)->first();
        $dramas = $others->favoritesDrama()->get(); //マイページ登録されている作品
        $reviews = $others->reviews()->get(); //レビュー投稿した作品。
        return view('user.userID.index', ['others' => $others, 'reviews' => $reviews]);
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
}
