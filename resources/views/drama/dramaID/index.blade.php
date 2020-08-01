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
                            <div class="col-md-3 text-md-left">
                                {{ $reviews->appends(request()->input())->links() }}
                            </div>
                            <div class="col-md-9 text-md-right">
                                <form method="get" action="{{ route('dramaID_index', ['drama_id' => $drama->id]) }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-9 text-md-right">
                                            <div class="form-group row">
                                                <div class="col-md-12 text-md-right">
                                                    <select name="sortby" class="" id="sortby">
                                                        <option value="update_desc" @if($sortby=='update_desc') selected @endif>投稿日が新しい順</option>
                                                        <option value="update_asc" @if($sortby=='update_asc') selected @endif>投稿日時が古い順</option>
                                                        <option value="total_evaluation_desc" @if($sortby=='total_evaluation_desc') selected @endif>総合評価が高い順</option>
                                                        <option value="total_evaluation_asc" @if($sortby=='total_evaluation_asc') selected @endif>総合評価が低い順</option>
                                                        <option value="like_desc" @if($sortby=='like_desc') selected @endif>いいねが多い順</option>
                                                        <option value="like_asc" @if($sortby=='like_asc') selected @endif>いいねが少ない順</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 text-md-right">
                                                    <label>
                                                        <input type="checkbox" name="sorts[]" value="watched" @if(in_array('watched' ,$sorts)) checked @endif>視聴済のみ
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="sorts[]" value="review_comment" @if(in_array('review_comment' ,$sorts)) checked @endif>コメント有のみ
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="sorts[]" value="following" @if(in_array('following' ,$sorts)) checked @endif>フォロー中のみ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 text-md-left">
                                            <input type="submit" value="並び替え">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($reviews as $review)
                                @include('layouts.component.review')
                            @endforeach
                            <div class="col-md-12 mx-auto">
                                {{ $reviews->appends(request()->input())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
