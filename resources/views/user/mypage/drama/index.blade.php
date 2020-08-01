@extends('layouts.member')

@section('title', 'すべての作品｜' . Auth::user()->penname . 'さんのマイページ')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto bg-white mb-4">
            <h2>すべての作品({{ $allreviews }}件)<span class="">({{ $reviews->firstitem() }}~{{ $reviews->lastitem() }}件目を表示)</span></h2>
            
            <form method="get" action="{{ route('my_alldrama') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12 text-md-right">
                        <select name="sortby" class="" id="sortby">
                            <option value="update_desc">投稿日が新しい順</option>
                            <option value="update_asc">投稿日時が古い順</option>
                            <option value="title_asc">タイトル昇順</option>
                            <option value="title_desc">タイトル降順</option>
                            <option value="total_evaluation_desc">総合評価が高い順</option>
                            <option value="total_evaluation_asc">総合評価が低い順</option>
                            <option value="like_desc">いいねが多い順</option>
                            <option value="like_asc">いいねが少ない順</option>
                        </select>
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
