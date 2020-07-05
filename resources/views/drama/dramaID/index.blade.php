@extends('layouts.front')

{{-- データベース作成後にタイトル修正予定 --}}
@section('title', $items->title . "シーズン" . $items->season)

{{-- データベース作成後に諸々修正予定(とりあえず文章を手入力) --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto bg-white">
                <h1>{{ $items->title }}　シーズン{{ $items->season }}の作品情報</h1>
                @include('layouts.component.dramapoint')
                
                <hr>
                <div class="row bg-warning">
                    <h3>作品概要</h3>
                    <div class="col-md-12">
                        <blockquote cite="{{ $items->url }}">
                            <p>{{ $items->introduction }}</p>
                            引用元：<cite><a href="{{ $items->url }}">{{ $items->title }}</a></cite>
                        </blockquote>
                    </div>
                </div>
                <hr>
                <div class="row bg-warning">
                    <div class="col-md-12">
                        <div class="row">
                            <h3>{{ $items->title }}のレビュー</h3>
                            <select name="data[User][userReviewSearchKindId]" class="" id="UserUserReviewSearchKindId">
                                <option value="created_desc" selected="selected">投稿日が新しい順</option>
                                <option value="created_asc">投稿日時が古い順</option>
                                <option value="point_asc">評価が高い順</option>
                                <option value="point_desc">評価が低い順</option>
                                <option value="like_asc">いいねが多い順</option>
                                <option value="like_desc">いいねが少ない順</option>
                            </select>
                        </div>
                        <div class="row">
                            {{-- @foreachでサイト各レビューを引っ張ってくる予定 --}}
                            @include('layouts.component.review')
                            @include('layouts.component.review')
                            @include('layouts.component.review')
                            ここにペジネーション配置
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
