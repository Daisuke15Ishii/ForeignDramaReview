@extends('layouts.member')

@section('title',  $title . '｜' . Auth::user()->penname . 'さんのマイページ')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto bg-white mb-4">
            <h2>{{ $title }}({{ $allreviews }}件)<span class="">({{ $reviews->firstitem() }}~{{ $reviews->lastitem() }}件目を表示)</span></h2>
            
            <form method="get" action="{{ route('my_drama', ['categorize' => $categorize]) }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-9 text-md-right">
                        <div class="form-group row">
                            <div class="col-md-12 text-md-right">
                                <select name="sortby" class="" id="sortby">
                                    <option value="update_desc" @if($sortby=='update_desc') selected @endif>投稿日が新しい順</option>
                                    <option value="update_asc" @if($sortby=='update_asc') selected @endif>投稿日時が古い順</option>
                                    <option value="title_asc" @if($sortby=='title_asc') selected @endif>タイトル昇順</option>
                                    <option value="title_desc" @if($sortby=='title_desc') selected @endif>タイトル降順</option>
                                    <option value="total_evaluation_desc" @if($sortby=='total_evaluation_desc') selected @endif>総合評価が高い順</option>
                                    <option value="total_evaluation_asc" @if($sortby=='total_evaluation_asc') selected @endif>総合評価が低い順</option>
                                    <option value="like_desc" @if($sortby=='like_desc') selected @endif>いいねが多い順</option>
                                    <option value="like_asc" @if($sortby=='like_asc') selected @endif>いいねが少ない順</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-md-right">
                                <label>
                                    <input type="checkbox" name="sorts[]" value="review_total_evaluation" @if(in_array('review_total_evaluation' ,$sorts)) checked @endif>未評価のみ
                                </label>
                                <label>
                                    <input type="checkbox" name="sorts[]" value="review_comment" @if(in_array('review_comment' ,$sorts)) checked @endif>未コメントのみ
                                </label>
                                <label>
                                    <input type="checkbox" name="sorts[]" value="favorite" @if(in_array('favorite' ,$sorts)) checked @endif>お気に入り以外
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-md-left">
                        <input type="submit" value="並び替え">
                    </div>
                </div>
            </form>
            
            {{ $reviews->appends(request()->input())->links() }}
            
            @foreach($reviews as $review)
                {{-- マージンがマイナスになってて表示がおかしいので後で修正 --}}
                @if($loop->odd)
                    {{-- ループが奇数回 --}}
                    <div class="row small my-3">
                        @include('layouts.component.mypagedramaindex')
                    @if($loop->last)
                        {{-- リストの最後 --}}
                        <div class="col-md-6 mx-auto">
                        </div>
                        @break
                    @endif
                @elseif($loop->even)
                    {{-- ループが偶数回 --}}
                        @include('layouts.component.mypagedramaindex')
                    </div>
                @endif
                @if($loop->iteration == 20)
                    {{-- 20作品表示 --}}
                    @break
                @endif
            @endforeach
            
            {{ $reviews->appends(request()->input())->links() }}
        </div>
        
    </div>
@endsection
