@extends('layouts.member')

@section('title',  'フォロワー一覧｜' . $others->penname . 'さんのマイページ')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto bg-white mb-4">
            <h2>{{ $others->penname }}さんのフォロワー一覧({{ $allfollowers }}件)<span class="">({{ $followers->firstitem() }}~{{ $followers->lastitem() }}件目を表示)</span></h2>

            {{ $followers->appends(request()->input())->links() }}
            
            @foreach($followers as $follower)
                {{-- マージンがマイナスになってて表示がおかしいので後で修正 --}}
                @if($loop->odd)
                    {{-- ループが奇数回 --}}
                    <div class="row small my-3">
                        @include('layouts.component.othersfollowedindex')
                    @if($loop->last)
                        {{-- リストの最後 --}}
                        <div class="col-md-6 mx-auto">
                        </div>
                        @break
                    @endif
                @elseif($loop->even)
                    {{-- ループが偶数回 --}}
                        @include('layouts.component.othersfollowedindex')
                    </div>
                @endif
                @if($loop->iteration == 20)
                    {{-- 20人だけ表示 --}}
                    @break
                @endif
            @endforeach
            
            {{ $followers->appends(request()->input())->links() }}
        </div>
    </div>
@endsection
