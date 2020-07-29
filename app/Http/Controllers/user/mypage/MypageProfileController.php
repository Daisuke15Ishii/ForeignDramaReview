<?php

namespace App\Http\Controllers\user\mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MypageProfileController extends Controller
{
    public function edit(Request $request){
        return view('user.mypage.profile.edit');
    }
    
    public function update(Request $request)
    {
        //validateは後で実装予定
        $user = \Auth::user();
        $user->profile = $request['profile'];

        $user->save();
        
        //updateに値がある場合は、view画面で「変更完了」のコメントを表示
        return view('user.mypage.profile.edit', ['update' => 'complete']);
    }
}
