@extends('layouts.front')

@section('title', 'サイトからのお知らせ｜サイト概要')

@section('content')
<div class="col-lg-8 mx-auto content-frame mb-4">
    <h1 class="content-title">サイトからのお知らせ</h1>
    <div class="px-4 pt-1 pb-3 text-center">
        {{-- 実装後回し。@foreach等でサイト更新履歴を引っ張ってくる予定 --}}
        <p>サイトからのお知らせは現在準備中です。</p>
        {{-- 下記は完成イメージ --}}
            {{-- 2020/6/14 【作品追加】「ブレイキング・バッド　シーズン5」の作品情報を追加しました。--}}
            {{-- 2020/6/14 【機能追加】ランキング機能を実装しました。--}}
    </div>
</div>
@endsection
