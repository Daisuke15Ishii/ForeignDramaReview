{{-- auth関連のルーティングやコントローラ実装は後回し --}}

{{-- layouts/front.blade.phpを読み込む --}}
@extends('layouts.front')

@section('title', '新規アカウント登録完了')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="">
                    <h1>新規アカウント登録完了</h1>
                </div>
                <div class="">
                    <p>ご登録いただきありがとうございます。新規アカウント登録が完了いたしました。</p>
                    <a class="" href="{{ url('/') }}"><img src="" alt="トップページに戻る"></a>
                </div>
            </div>
        </div>
    </div>
@endsection
