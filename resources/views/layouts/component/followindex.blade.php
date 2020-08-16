{{-- user.mypage.followingindexにて利用 --}}
{{-- user.mypage.followedindexにて利用 --}}
{{-- user.userID.followingindexにて利用 --}}
{{-- user.userID.followedindexにて利用 --}}

<div class="row justify-content-center p-0 m-0">
    <div class="col-12 content-frame mb-2">
        <h1 class="content-title">
            @if($index == "フォロー一覧")
                {{ $member->penname }}さんのフォロー一覧({{ $allfollows }}件)({{ $follows ->firstitem() }}~{{ $follows ->lastitem() }}件目)
            @else
                {{ $member->penname }}さんのフォロワー一覧({{ $allfollows }}件)({{ $follows->firstitem() }}~{{ $follows->lastitem() }}件目)
            @endif
        </h1>

        {{ $follows->appends(request()->input())->links() }}

        @foreach($follows as $follow)
            @if($loop->odd)
                {{-- ループが奇数回 --}}
                <div class="row small mx-0">
                @if($index == "フォロー一覧")
                    @include('layouts.component.mypagefollowindex', ['user' => $follow->following()->first()])
                @else
                    @include('layouts.component.mypagefollowindex', ['user' => $follow->followed()->first()])
                @endif
                        
                @if($loop->last)
                    {{-- リストの最後 --}}
                        <div class="col-md-6 mx-auto">
                        </div>
                    </div>
                    @break
                @endif
            @elseif($loop->even)
                {{-- ループが偶数回 --}}
                @if($index == "フォロー一覧")
                    @include('layouts.component.mypagefollowindex', ['user' => $follow->following()->first()])
                @else
                    @include('layouts.component.mypagefollowindex', ['user' => $follow->followed()->first()])
                @endif
                </div>
            @endif
            @if($loop->iteration == 20)
                {{-- 20人だけ表示 --}}
                @break
            @endif
        @endforeach

        {{ $follows->appends(request()->input())->links() }}
    </div>
</div>
