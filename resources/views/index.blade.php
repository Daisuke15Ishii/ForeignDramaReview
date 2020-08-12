@extends('layouts.front')

@section('title', 'TOP')

@section('content')
<div class="col-12 mx-auto p-0 m-0">
    <div class="row justify-content-center p-0 m-0">
        <div class="col-12 mx-auto content-frame mb-4">
            <h1 class="content-title">洋ドラ会議について</h1>
            <div class="main-content px-4 pt-1 pb-3">
                <p class="alert">(注意)当サイトは、現在準備中のため、ご利用はお控えください。</p>
                @include('layouts.component.about')
                <p class="text-right mr-2 mb-2"><a href="{{ url('/about') }}">サイト概要へ</a></p>
            </div>
        </div>
    
        <div class="col-12 mx-auto content-frame mb-4">
            <h2 class="content-title">サイトからのお知らせ</h2>
            {{-- 実装後回し。@foreach等でサイト更新履歴を引っ張ってくる予定 --}}
            <p class="text-center">サイトからのお知らせは現在準備中です。</p>
                {{-- 下記は完成イメージ --}}
                    {{-- 2020/6/14 【作品追加】「ブレイキング・バッド　シーズン5」の作品情報を追加しました。--}}
                    {{-- 2020/6/14 【機能追加】ランキング機能を実装しました。--}}
            <p class="text-right mr-2 mb-2"><a href="{{ url('/about/info') }}">お知らせ一覧へ</a></p>
        </div>
        
        <div class="col-12 mx-auto content-frame mb-4">
            <h2 class="content-title">おすすめドラマ(総合評価ランキング)</h2>
            <div class="row">
                <div class="col-11 mx-auto">
                    @foreach($scores as $score )
                        @include('layouts.component.dramaindex', ['drama' => $score->drama()->first()])
                    @endforeach
                    <p class="text-right mr-2 mb-2"><a href="{{ route('ranking_index') }}">おすすめドラマ一覧へ</a></p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-9 content-frame mb-4">
            <h2 class="content-title">最新レビュー</h2>
            <div class="row main-content m-0">
                <div class="col-12 mb-2">
                    @foreach($reviews as $review)
                        @include('layouts.component.reviewindex')
                    @endforeach
                    <p class="text-right mr-2 mb-2"><a href="{{ route('review_index') }}">最新レビュー一覧へ</a></p>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
