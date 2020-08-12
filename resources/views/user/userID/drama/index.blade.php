@extends('layouts.others')

@section('title',  $title . '｜' . $others->penname . 'さんのマイページ')

@section('content')
<div class="row justify-content-center p-0 m-0">
    <div class="col-12 content-frame">
        <h1 class="content-title">{{ $title }}({{ $allreviews }}件)({{ $reviews->firstitem() }}~{{ $reviews->lastitem() }}件目)</h1>
        
        <form method="get" action="{{ route('others_drama', ['userID' => $others->id, 'categorize' => $categorize]) }}">
            @include('layouts.component.mypagedramaorder', ['favor' => 'no'])
        </form>
        
        <div class="col-12">
            {{ $reviews->appends(request()->input())->links() }}
        </div>
        
        @foreach($reviews as $review)
            @if($loop->odd)
                {{-- ループが奇数回 --}}
                <div class="row small mb-2 mx-0">
                    @include('layouts.component.othersdramaindex')
                @if($loop->last)
                    {{-- リストの最後 --}}
                        <div class="col-md-6 mx-auto">
                        </div>
                    </div>
                    @break
                @endif
            @elseif($loop->even)
                {{-- ループが偶数回 --}}
                    @include('layouts.component.othersdramaindex')
                </div>
            @endif
            @if($loop->iteration == 20)
                {{-- 20作品表示 --}}
                @break
            @endif
        @endforeach
        
        <div class="col-12 mx-auto">
            {{ $reviews->appends(request()->input())->links() }}
        </div>
    </div>
</div>
@endsection
