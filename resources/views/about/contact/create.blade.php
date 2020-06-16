{{-- layouts/front.blade.phpを読み込む --}}
@extends('layouts.front')

@section('title', 'お問合せ｜洋ドラ会議(仮)')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="">
                    <h1>お問合せ</h1>
                </div>
                <div class="">
                    <form action="#" method="post">
                        <table>
                            @csrf
                            {{-- valueの値は後回し。変数入れるとエラーになるので今は仮入力 --}}
                            {{-- @errorの記述、name、textareaも後回し --}}
                            <tr>
                                <th>法人名：</th>
                                <td><input type="text" name="" value="old"></td>
                            </tr>
                            <tr>
                                <th>法人名ﾌﾘｶﾞﾅ：</th>
                                <td><input type="text" name="" value="old"></td>
                            </tr>
                            <tr>
                                <th>名前<span class="">(必須)</span>：</th>
                                <td><input type="text" name="" value="old"></td>
                            </tr>
                            <tr>
                                <th>名前ﾌﾘｶﾞﾅ<span class="">(必須)</span>：</th>
                                <td><input type="text" name="" value="old"></td>
                            </tr>
                            <tr>
                                <th>電話番号：</th>
                                <td><input type="text" name="" value="old"></td>
                            </tr>
                            <tr>
                                <th>メールアドレス<span class="">(必須)</span>：</th>
                                <td><input type="text" name="" value="old"></td>
                            </tr>
                            <tr>
                                <th>メールアドレス(確認)<span class="">(必須)</span>：</th>
                                <td><input type="text" name="" value="old"></td>
                            </tr>
                            <tr>
                                <th>お問合せ内容<span class="">(必須)</span>：</th>
                                <td><input type="textarea" name="" value="old"></td>
                            </tr>
                        </table>
                        <p>※内容をご確認の上、よろしければ送信ボタンをクリックしてください。</p>
                        <input type="submit" name="submit" value="送信">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
