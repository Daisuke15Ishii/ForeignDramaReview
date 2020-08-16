{{-- user.mypage.likeindexにて利用 --}}
{{-- user.userID.likeindexにて利用 --}}

<div class="row justify-content-center p-0 m-0">
    <div class="col-12 content-frame mb-2">
        <h1 class="content-title">
            @if($users !== "")
                {{ $users->penname }}さんがいいねしたレビュー一覧({{ $alllikes }}件)<span class="">({{ $likes->firstitem() }}~{{ $likes->lastitem() }}件目)
            @else
                いいねしたレビュー一覧({{ $alllikes }}件)({{ $likes->firstitem() }}~{{ $likes->lastitem() }}件目)
            @endif
        </h1>

        @foreach($likes as $like)
            @include('layouts.component.reviewindex', ['review' => $like->review()->first(), 'iine' => 'yes'])
        @endforeach
        
        {{ $likes->appends(request()->input())->links() }}
    </div>
</div>
