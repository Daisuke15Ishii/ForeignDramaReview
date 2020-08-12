@extends('layouts.front')

@section('title', '新規アカウント登録完了')

@section('content')
<div class="col-lg-8 mx-auto content-frame mb-4">
    <h1 class="content-title">新規アカウント登録完了</h1>
    <div class="px-4 pt-1 pb-3">
        <p>ご登録いただきありがとうございます。新規アカウント登録が完了いたしました。</p>
        <p><a href="{{ url('/') }}">トップページに戻る</a></p>
    </div>
</div>
@endsection
