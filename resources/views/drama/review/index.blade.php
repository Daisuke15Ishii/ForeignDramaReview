@extends('layouts.front')

@section('title', '最新レビュー')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto bg-white mb-4">
                <h2>最新レビュー一覧({{ $allreviews }}件)<span class="">({{ $reviews->firstitem() }}~{{ $reviews->lastitem() }}件目を表示)</span></h2>
                
                <form method="get" action="{{ route('review_index') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-9 text-md-right">
                            <div class="form-group row">
                                <div class="col-md-12 text-md-right">
                                    <label>
                                        <input type="checkbox" name="sorts[]" value="review_comment" @if(in_array('review_comment' ,$sorts)) checked @endif>コメント有のみ
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 text-md-left">
                            <input type="submit" value="絞込み">
                        </div>
                    </div>
                </form>
                
                {{ $reviews->appends(request()->input())->links() }}
                
                @foreach($reviews as $review)
                    {{-- マージンがマイナスになってて表示がおかしいので後で修正 --}}
                    @include('layouts.component.reviewindex')
                @endforeach
                
                {{ $reviews->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
@endsection
