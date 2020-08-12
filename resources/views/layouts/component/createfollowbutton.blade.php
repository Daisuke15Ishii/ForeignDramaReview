{{-- component.reviewにて利用 --}}
{{-- user.userID.indexにて利用 --}}
{{-- component.side-othersにて利用 --}}

@auth
    @if ( $others->id !== Auth::id() )
        <form action="{{ route('others_follow', ['userID' => $others->id]) }}" method="POST" name="follow">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="following_user_id" value="{{ $others->id }}">
            {{-- 既にフォロー済かの判定。レビューの人がauth::user()にフォローされているか調べる --}}
            @if (empty($others->followedUser()->where('user_id',Auth::id())->first()))
                <input type="hidden" value="フォロー" name="follow">
                <button type="submit" class="btn-register btn-accent-color m-0 {{ $class }}">
                    フォローする
                </button>
            @else
                <input type="hidden" value="フォロー解除" name="follow">
                <button type="submit" class="btn-register btn-delete-color m-0 {{ $class }}">
                    フォロー解除
                </button>
            @endif
        </form>
    @endif
@else
    {{-- まずはログインに遷移--}}
    <a href="{{ route('login') }}">
        <button class="btn-register btn-accent-color m-0 {{ $class }}">
            フォロー
        </button>
    </a>
@endauth
