{{-- layouts/front.blade.phpを読み込む --}}
@extends('layouts.front')

@section('title', 'お問合せ送信完了｜洋ドラ会議(仮)')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="">
                    <h1>お問合せ送信完了</h1>
                </div>
                <div class="">
                    <p>お問合せの送信が完了いたしました。<br>
                    後程、ご入力いただいたメールアドレスに確認メールをお送りさせていただきます。</p>
                    <a class="" href="{{ url('/') }}"><img src="" alt="トップページに戻る"></a>
                </div>
            </div>
        </div>
    </div>
@endsection
