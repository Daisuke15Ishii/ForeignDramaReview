@extends('layouts.others')

@section('title', 'お気に入りの作品｜' . $others->penname . 'さんのマイページ')

@section('content')
<div class="row justify-content-center p-0 m-0">
    <div class="col-12 content-frame mb-2">
        <h1 class="content-title">お気に入りの作品({{ $allreviews }})({{ $reviews->firstitem() }}~{{ $reviews->lastitem() }}件目)</h1>
        
        <form method="get" action="{{ route('others_favorite_drama', ['userID' => $others->id]) }}">
            @include('layouts.component.mypagedramaorder', ['favor' => 'yes'])
        </form>
        
        {{ $reviews->appends(request()->input())->links() }}
        
        @foreach($reviews as $review)
            @include('layouts.component.favoritedramaindex', ['top' => 'yes', 'user' => 'other'])
        @endforeach

        {{ $reviews->appends(request()->input())->links() }}
    </div>
    
</div>
@endsection
