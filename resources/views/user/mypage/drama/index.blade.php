@extends('layouts.member')

@section('title',  $title . '｜' . Auth::user()->penname . 'さんのマイページ')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto bg-white mb-4">
            <h2>{{ $title }}({{ $allreviews }}件)<span class="">({{ $reviews->firstitem() }}~{{ $reviews->lastitem() }}件目を表示)</span></h2>
            
            <form method="get" action="{{ route('my_drama', ['categorize' => $categorize]) }}">
                @include('layouts.component.mypagedramaorder')
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
