@extends('layouts.front')

@section('title', $drama->title . "シーズン" . $drama->season)

@section('content')
<div class="col-12 mx-auto content-frame">
    <h1 class="content-title">{{ $drama->title }} シーズン{{ $drama->season }}の作品情報</h1>
    <div class="row main-content m-0">
        <div class="col-md-11 mx-auto mb-2">
            @include('layouts.component.dramapoint')
            
            <hr>
            <div class="row mb-4 p-2">
                <div class="col-12 mx-auto dramaindex-frame mb-2 pt-2">
                    <h2>作品概要</h2>
                    <div class="row main-content m-0">
                        <div class="col-12 mb-2">
                            <dl class="summary">
                                <dt>タイトル</dt>
                                <dd><cite>{{ $drama->title }} シーズン{{ $drama->season }}({{ $drama->title_en }})</cite></dd>
                                <dt>出演者</dt>
                                <dd>{{ $drama->cast1 }}、{{ $drama->cast2 }}、{{ $drama->cast3 }}</dd>
                                <dt>監督等</dt>
                                <dd>{{ $drama->staff }}</dd>
                                <dt>国</dt>
                                <dd>{{ $drama->country }}</dd>
                                <dt>放映開始</dt>
                                <dd>
                                    @if($drama->onair !== null)
                                        {{ date('放映開始：Y年m月～', strtotime($drama->onair)) }}
                                    @else
                                        --年--月
                                    @endif
                                </dd>
                                <dt>話数</dt>
                                <dd>
                                    @if($drama->number !== null)
                                        全{{ $drama->number }}話
                                    @else
                                        話数：全--話
                                    @endif
                                </dd>
                                <dt>ジャンル</dt>
                                <dd>
                                    @foreach($drama->janre()->get() as $janre)
                                        {{ $janre->janre }}
                                    @endforeach
                                </dd>
                                <dt class="story">あらすじ(引用)</dt>
                                <dd>
                                    <blockquote class="index-quote" cite="{{ $drama->url }}">
                                        <p>{{ $drama->introduction }}</p>
                                    </blockquote>
                                    <p>引用元：<cite><a href="{{ $drama->url }}" target="_blank">{{ $drama->title }}</a></cite></p>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr>
            <div class="row mb-4 p-2">
                <div class="col-12 mx-auto dramaindex-frame mb-2 pt-2">
                    <h2>{{ $drama->title }}のレビュー</h2>
                    <div class="row main-content m-0">
                        <div class="col-12 mb-2">
                            <form method="get" action="{{ route('dramaID_index', ['drama_id' => $drama->id]) }}">
                                @csrf
                                <div class="order-group row">
                                    <div class="col-sm-12 text-right">
                                        <label>
                                            <input type="checkbox" name="sorts[]" value="watched" @if(in_array('watched' ,$sorts)) checked @endif>視聴済のみ
                                        </label>
                                        <label>
                                            <input type="checkbox" name="sorts[]" value="review_comment" @if(in_array('review_comment' ,$sorts)) checked @endif>コメント有のみ
                                        </label>
                                        <label>
                                            <input type="checkbox" name="sorts[]" value="spoiler_display" @if(in_array('spoiler_display' ,$sorts)) checked @endif>ネタバレ表示
                                        </label>
                                        <label>
                                            <input type="checkbox" name="sorts[]" value="following" @if(in_array('following' ,$sorts)) checked @endif>フォロー中のみ
                                        </label>
                                    </div>
                                    <div class="col-sm-12 text-right">
                                        <select name="sortby" class="order-select" id="sortby">
                                            <option value="update_desc" @if($sortby=='update_desc') selected @endif>投稿日が新しい順</option>
                                            <option value="update_asc" @if($sortby=='update_asc') selected @endif>投稿日時が古い順</option>
                                            <option value="total_evaluation_desc" @if($sortby=='total_evaluation_desc') selected @endif>総合評価が高い順</option>
                                            <option value="total_evaluation_asc" @if($sortby=='total_evaluation_asc') selected @endif>総合評価が低い順</option>
                                            <option value="like_desc" @if($sortby=='like_desc') selected @endif>いいねが多い順</option>
                                            <option value="like_asc" @if($sortby=='like_asc') selected @endif>いいねが少ない順</option>
                                        </select>
                                        <button type="submit" class="btn btn-accent-color">ソート</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        {{-- スマホ時のみ上部にペジネーション表示 --}}
                        <div class="col-12 not-2">
                            {{ $reviews->appends(request()->input())->links() }}
                        </div>

                        @foreach($reviews as $review)
                            @include('layouts.component.review')
                        @endforeach
                        
                        <div class="col-12 mx-auto">
                            {{ $reviews->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
