{{-- layouts/front.blade.phpを読み込む --}}
@extends('layouts.front')

@section('title', 'サイトからのお知らせ|サイト概要')

{{-- front.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="">
                    <h1>サイトからのお知らせ</h1>
                </div>
                <div class="">
                    {{-- 実装後回し。@foreach等でサイト更新履歴を引っ張ってくる予定 --}}
                    <p>サイトからのお知らせは現在準備中です。</p>
                    {{-- 下記は完成イメージ --}}
                        {{-- 2020/6/14 【作品追加】「ブレイキング・バッド　シーズン5」の作品情報を追加しました。--}}
                        {{-- 2020/6/14 【機能追加】ランキング機能を実装しました。--}}
                </div>
            </div>
        </div>
    </div>
@endsection
