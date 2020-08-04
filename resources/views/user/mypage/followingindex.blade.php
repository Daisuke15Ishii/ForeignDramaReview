@extends('layouts.member')

@section('title',  'フォロー中のユーザー一覧｜' . Auth::user()->penname . 'さんのマイページ')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto bg-white mb-4">
            <h2>フォロー一覧({{ $allfollowings }}件)<span class="">({{ $followings->firstitem() }}~{{ $followings->lastitem() }}件目を表示)</span></h2>

            {{ $followings->appends(request()->input())->links() }}
            
            @foreach($followings as $following)
                {{-- マージンがマイナスになってて表示がおかしいので後で修正 --}}
                @if($loop->odd)
                    {{-- ループが奇数回 --}}
                    <div class="row small my-3">
                        @include('layouts.component.mypagefollowingindex')
                    @if($loop->last)
                        {{-- リストの最後 --}}
                        <div class="col-md-6 mx-auto">
                        </div>
                        @break
                    @endif
                @elseif($loop->even)
                    {{-- ループが偶数回 --}}
                        @include('layouts.component.mypagefollowingindex')
                    </div>
                @endif
                @if($loop->iteration == 20)
                    {{-- 20人だけ表示 --}}
                    @break
                @endif
            @endforeach
            
            {{ $followings->appends(request()->input())->links() }}
        </div>
    </div>
@endsection