@extends('layouts.front')

@section('title', $drama->title . "シーズン" . $drama->season)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto bg-white">
                <h1>{{ $drama->title }} シーズン{{ $drama->season }}の作品情報</h1>
                @include('layouts.component.dramapoint')
                
                <hr>
                <div class="row bg-warning">
                    <h3>作品概要</h3>
                    <div class="col-md-12">
                        <blockquote cite="{{ $drama->url }}">
                            <p>{{ $drama->introduction }}</p>
                            引用元：<cite><a href="{{ $drama->url }}">{{ $drama->title }}</a></cite>
                        </blockquote>
                    </div>
                </div>
                <hr>
                <div class="row bg-warning">
                    <div class="col-md-12">
                        <h3>{{ $drama->title }}のレビュー</h3>
                        <div class="row clearfix">
                            <div class="col-md-3 float-left">
                                <select name="data[User][userReviewSearchKindId]" class="" id="UserUserReviewSearchKindId">
                                    <option value="created_desc" selected="selected">投稿日が新しい順</option>
                                    <option value="created_asc">投稿日時が古い順</option>
                                    <option value="point_asc">評価が高い順</option>
                                    <option value="point_desc">評価が低い順</option>
                                    <option value="like_asc">いいねが多い順</option>
                                    <option value="like_desc">いいねが少ない順</option>
                                </select>
                            </div>
                            <div class="col-md-9 float-right">
                                {{ $reviews->links() }}
                            </div>
                        </div>
                        <div class="row">
                            @foreach($reviews as $review)
                                @include('layouts.component.review')
                            @endforeach
                            <div class="col-md-12 mx-auto">
                                {{ $reviews->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
