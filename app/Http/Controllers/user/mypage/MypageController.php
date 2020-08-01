<?php

namespace App\Http\Controllers\user\mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MypageController extends Controller
{
    public function index(Request $request){
        $auth = \Auth::user();
        $dramas = $auth->favoritesDrama()->get(); //マイページ登録されている作品
        $reviews = $auth->reviews()->get(); //レビュー投稿した作品。これはviewに渡す必要ないかも
        return view('user.mypage.index', ['reviews' => $reviews]);
    }
}
