@extends('layouts.front')

@section('title', '最新レビュー')

@section('content')
<div class="col-lg-9 content-frame">
    <h1 class="content-title">最新レビュー一覧({{ $allreviews }}件)({{ $reviews->firstitem() }}~{{ $reviews->lastitem() }}件目)</h1>
    <div class="row main-content m-0">
        <div class="col-12 mb-2">
            <form method="get" action="{{ route('review_index') }}">
                @csrf
                <div class="order-group row">
                    <div class="col-sm-12 text-right">
                        <label>
                            <input type="checkbox" name="sorts[]" value="review_comment" @if(in_array('review_comment' ,$sorts)) checked @endif>コメント有のみ
                        </label>
                        <button type="submit" class="btn btn-accent-color">絞込み</button>
                    </div>
                </div>
            </form>

            <div class="col-12 not-pc">
                {{ $reviews->appends(request()->input())->links() }}
            </div>

            @foreach($reviews as $review)
                @include('layouts.component.reviewindex')
            @endforeach
            
            <div class="col-12">
                {{ $reviews->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
