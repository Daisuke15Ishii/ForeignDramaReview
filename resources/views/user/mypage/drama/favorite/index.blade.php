@extends('layouts.member')

@section('title', 'お気に入りの作品｜' . Auth::user()->penname . 'さんのマイページ')

@section('content')
<div class="row justify-content-center p-0 m-0">
    <div class="col-12 content-frame">
        <h1 class="content-title">お気に入りの作品({{ $allreviews }})({{ $reviews->firstitem() }}~{{ $reviews->lastitem() }}件目</h1>
        
        <form method="get" action="{{ route('my_favorite_drama') }}">
            @include('layouts.component.mypagedramaorder', ['favor' => 'yes'])
        </form>
        
        {{ $reviews->appends(request()->input())->links() }}
        
        @foreach($reviews as $review)
            @include('layouts.component.favoritedramaindex', ['top' => 'no'])
        @endforeach
        
        {{ $reviews->appends(request()->input())->links() }}
    </div>
    
</div>
@endsection
