{{-- layouts/front.blade.phpを読み込む --}}
@extends('layouts.front')

{{-- front.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '洋ドラ会議(仮)')

{{-- front.blade.phpの@yield('content')に以下のタグを埋め込む --}}
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
                {{-- @foreachでサイト更新履歴を引っ張ってくる予定 --}}
                サイト更新履歴を↓こんな感じで↓
                <p>2020/6/14　【作品追加】「ブレイキング・バッド　シーズン5」の作品情報を追加しました。</p>
                <p>2020/6/14　【作品追加】「ブレイキング・バッド　シーズン5」の作品情報を追加しました。</p>
                <p>2020/6/14　【作品追加】「ブレイキング・バッド　シーズン5」の作品情報を追加しました。</p>
                <p style="text-align: right"><a href="#">お知らせ一覧へ</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>おすすめドラマ(総合評価ランキング)</h2>
                {{-- @foreachで総合評価点数上位3作品を引っ張ってくる予定 --}}
                <p>作品1</p>
                <p>作品2</p>
                <p>作品3</p>
                <p style="text-align: right"><a href="#">おすすめドラマ一覧へ</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>最新レビュー</h2>
                {{-- @foreachで最新レビュー投稿を6作品を引っ張ってくる予定 --}}
                <p>作品1/投稿者1</p>
                <p>作品2/投稿者1</p>
                <p>作品3/投稿者1</p>
                <p>作品4/投稿者1</p>
                <p>作品5/投稿者1</p>
                <p>作品6/投稿者1</p>
                <p style="text-align: right"><a href="#">最新レビュー一覧へ</a></p>
            </div>
        </div>
    </div>
@endsection
