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
                        <p>{{ $re->drama_id }}</p>
                        <blockquote cite="{{ $drama->url }}">
                            <p>{{ $drama->introduction }}</p>
                            引用元：<cite><a href="{{ $drama->url }}">{{ $drama->title }}</a></cite>
                        </blockquote>
                    </div>
                </div>
                <hr>
                <div class="row bg-warning">
                    <div class="col-md-12">
                        <div class="row">
                            <h3>{{ $drama->title }}のレビュー</h3>
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
                            @foreach($reviews as $review)
                                @include('layouts.component.review')
                            @endforeach
                            
                            {{ $reviews->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
