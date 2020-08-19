<?php

namespace App\Http\Controllers\user\mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Auth;

class MypageSettingController extends Controller
{
    public function edit(Request $request){
        //ユーザー情報の編集画面(setting)を表示するアクション
        return view('user.mypage.setting.edit');
    }
    
    public function update(Request $request){
        //ユーザー情報の編集(setting)を保存するアクション
        //validateは後で実装予定
        $user = Auth::user();

        //App\Http\Controllers\Auth\RegisterControllerのvalidatorメソッドから内容ほぼコピペ(継承が上手くいかなかったため仕方なく)
        //auth関連の整備等は保留(後日)
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id . ',id'], //自分以外でユニーク
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            //追加カラム分
            'name_kana' => ['required', 'string', 'max:40'],
            'penname' => ['required', 'string', 'max:40', 'unique:users,penname,' . $user->id . ',id'], //自分以外でユニーク
            'gender' => ['required', 'in:male,female'],
            //画像のバリデートも後で記述予定
            'birthyear' => ['required'],
        ]);

        if($request['image'] !== null){
            //画像ファイルの保存場所
            $img = '/images/';
        }else{
            $img = '';
        }


        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        
        //追加カラム分
        $user->name_kana = $request['name_kana'];
        $user->penname = $request['penname'];
        $user->gender = $request['gender'];
        $user->birth = $request['birthyear'] . '-' . $request['birthmonth'] . '-01';
        $user->image = $img . $request['image'];

        $user->save();

        return view('user.mypage.setting.complete');
    }
}
