<?php

namespace App\Http\Controllers\user\mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;


class MypageSettingController extends Controller
{
    public function edit(Request $request){
        //ユーザー情報の編集画面(setting)を表示するアクション
        return view('user.mypage.setting.edit');
    }
    
    public function update(Request $request){
        //ユーザー情報の編集(setting)を保存するアクション
        //validateは後で実装予定
        $user = \Auth::user();

        $user->name = $request['name'];
/*バリデーション実装後に保存可能にする(想定しないアドレス,パスワードに変更するとログインできなくなるため)
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
*/
        //追加カラム分
        $user->name_kana = $request['name_kana'];
        $user->penname = $request['penname'];
        $user->gender = $request['gender'];
        $user->birth = $request['birthyear'] . '-' . $request['birthmonth'] . '-01';
        $user->image = '/images/' . $request['image'];

        $user->save();

        return view('user.mypage.setting.complete');
    }
}
