@extends('layouts.member')

@section('title',  Auth::user()->penname . 'さんのマイページ')

@section('content')
<div class="row">
    <div class="col-12 content-frame mb-4">
        <h2 class="content-title">{{ Auth::user()->penname }}さんへの未読通知</h2>
        <div class="main-content">
            {{-- 実装は後回し --}}
            <p class="text-center">通知機能は現在準備中です。</p>
                {{-- 下記は完成イメージ --}}
                    {{-- 2020/5/15　【レビュー投稿】フォローしている●●さんが「ブレイキングバッド　シーズン5」のレビューを投稿しました。 --}}
                    {{-- 2020/5/15　【いいね】だいさんさんの「ブレイキング・バッド　シーズン5」のレビューが●●さんにいいねされました。 --}}
                    {{-- 2020/5/15　【フォロー】●●さんにフォローされました。 --}}
                    {{-- 2020/5/15　【レビュー投稿】フォローしている●●さんが「ブレイキングバッド　シーズン5」のレビューを投稿しました。 --}}
                    {{-- 2020/5/15　【いいね】だいさんさんの「ブレイキング・バッド　シーズン5」のレビューが●●さんにいいねされました。 --}}
                    {{-- 2020/5/15　【フォロー】●●さんにフォローされました。 --}}
                    {{-- 2020/5/15　【レビュー投稿】フォローしている●●さんが「ブレイキングバッド　シーズン5」のレビューを投稿しました。 --}}
                    {{-- 2020/5/15　【いいね】だいさんさんの「ブレイキング・バッド　シーズン5」のレビューが●●さんにいいねされました。 --}}
            <p class="text-right mr-2 mb-2">通知一覧へ</p>
        </div>
    </div>
    
    <div class="col-12 content-frame mb-4">
        <h2 class="content-title">最新投稿レビュー</h2>
        {{-- 投稿更新日が新しい順に表示 --}}
        @foreach(Auth::user()->reviews()->orderBy('updated_at', 'desc')->get() as $review)
            @if($loop->odd)
                {{-- ループが奇数回 --}}
                    <div class="row small mb-2 mx-0">
                    @include('layouts.component.mypagedramaindex')
                @if($loop->last)
                    {{-- リストの最後 --}}
                        <div class="col-md-6 mx-auto">
                        </div>
                    </div>
                    @break
                @endif
            @elseif($loop->even)
                {{-- ループが偶数回 --}}
                    @include('layouts.component.mypagedramaindex')
                </div>
            @endif
            @if($loop->iteration == 4)
                {{-- 4作品だけ表示 --}}
                @break
            @endif
        @endforeach
        
        {{-- 「評価済」にチェックが入った状態の「すべての作品」ページへのリンク--}}
        <p class="text-right mr-2 mb-2"><a href="{{ route('my_drama', ['categorize' => 'all', 'sorts' => array('review_total_evaluation')]) }}">すべての作品へ</a></p>
    </div>
    
    {{-- お気に入り作品表示 --}}
    <div class="col-12 content-frame mb-4">
        <h2 class="content-title">お気に入り作品</h2>
        @foreach(Auth::user()->reviews()->wherehas('favorite', function($q){
            $q->where('favorite', '1');
            })->orderby('total_evaluation', 'desc')->get() as $review)
                @include('layouts.component.favoritedramaindex', ['top' => 'yes', 'user' => 'mypage'])
            @if($loop->iteration == 10)
                {{-- 10作品だけ表示 --}}
                @break
            @endif
        @endforeach
        <p class="text-right mr-2 mb-2"><a href="{{ route('my_favorite_drama') }}">お気に入り一覧へ</a></p>
    </div>
</div>
@endsection
