@extends('layouts.front')

@section('title', '洋ドラ会議(仮)')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <p>当サイトは、海外ドラマの評価・レビュー/口コミサイトです。</p><br>
                <p>当サイトを利用することにより、次の体験を提供いたします。</p>
                <ol>
                    <li>面白い海外ドラマを探す</li>
                    <li>面白かった海外ドラマを語り合う</li>
                    <li>海外ドラマの視聴歴を管理し、自分だけのお気に入りコレクションを作成する</li>
                </ol>
                <p>会員登録を行うと、レビュー投稿などのドラマ評価が可能になります。また、視聴履歴の整理、お気に入り作品登録なども可能になります。</p>
                <p>より良いデータベース作成のため、皆様のご協力をお願いします。</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>サイトからのお知らせ</h2>
                {{-- 実装後回し。@foreach等でサイト更新履歴を引っ張ってくる予定 --}}
                <p>サイトからのお知らせは現在準備中です。</p>
                <p style="text-align: right">お知らせ一覧へ</p>
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
