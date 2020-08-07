@extends('layouts.front')

@section('title', 'TOP')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                @include('layouts.component.about')
                <p style="text-align: right"><a href="{{ url('/about') }}">サイト概要へ</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>サイトからのお知らせ</h2>
                {{-- 実装後回し。@foreach等でサイト更新履歴を引っ張ってくる予定 --}}
                <p>サイトからのお知らせは現在準備中です。</p>
                    {{-- 下記は完成イメージ --}}
                        {{-- 2020/6/14 【作品追加】「ブレイキング・バッド　シーズン5」の作品情報を追加しました。--}}
                        {{-- 2020/6/14 【機能追加】ランキング機能を実装しました。--}}
                <p style="text-align: right"><a href="{{ url('/about/info') }}">お知らせ一覧へ</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>おすすめドラマ(総合評価ランキング)</h2>
                <div class="row">
                    <div class="col-md-11 mx-auto">
                        @foreach($scores as $score )
                            @include('layouts.component.rankingindex')
                        @endforeach
                        <p style="text-align: right"><a href="{{ route('ranking_index') }}">おすすめドラマ一覧へ</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>最新レビュー</h2>
                @foreach($reviews as $review)
                    {{-- マージンがマイナスになってて表示がおかしいので後で修正 --}}
                    @include('layouts.component.reviewindex')
                @endforeach
                <p style="text-align: right"><a href="{{ route('review_index') }}">最新レビュー一覧へ</a></p>
            </div>
        </div>
    </div>
@endsection
