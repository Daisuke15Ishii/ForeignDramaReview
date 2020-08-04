@extends('layouts.others')

@section('title', 'お気に入りの作品｜' . $others->penname . 'さんのマイページ')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto bg-white mb-4">
            <h2>お気に入りの作品({{ $allreviews }})<span class="">({{ $reviews->firstitem() }}~{{ $reviews->lastitem() }}件目を表示)</span></h2>
            
            <form method="get" action="{{ route('others_favorite_drama', ['userID' => $others->id]) }}">
                @include('layouts.component.favoritedramaorder')
            </form>
            
            {{ $reviews->appends(request()->input())->links() }}
            
            @foreach($reviews as $review)
                <div class="row my-3">
                    {{-- マージンがマイナスになってて表示がおかしいので後で修正 --}}
                    <div class="col-md-1">
                        第{{ $i = $loop->iteration + (($reviews->currentPage() - 1) * $reviews->perPage()) }}位
                    </div>
                    @include('layouts.component.othersfavoritedramaindex')
                </div>
            @endforeach
            
            {{ $reviews->appends(request()->input())->links() }}
        </div>
        
    </div>
@endsection
