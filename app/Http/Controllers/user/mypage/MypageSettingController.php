<?php

namespace App\Http\Controllers\user\mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;


class MypageSettingController extends Controller
{

    public function edit(Request $request){
        return view('user.mypage.setting.edit');
    }
    
    public function update(Request $request)
    {
        //validateは後で実装予定
        $user = \Auth::user();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        
        //追加カラム分
        $user->name_kana = $request['name_kana'];
        $user->penname = $request['penname'];
        $user->gender = $request['gender'];
        $user->birth = $request['birthyear'] . '-' . $request['birthmonth'] . '-01';
        $user->image = $request['image'];

        $user->save();

        return view('user.mypage.setting.complete');

    }
}
