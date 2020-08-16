{{-- component.side-memberにて利用 --}}
{{-- component.side-othersにて利用 --}}
{{-- component.review --}}
{{-- component.reviewindexにて利用 --}}
{{-- mypage.mypagefollowingindexにて利用 --}}

<p class="{{ $class }}">
    @if(isset($user->image))
        <img src="{{ secure_asset($user->image) }}" alt="{{ $user->penname}}さんアイコン画像" title="{ $user->penname }さん">
    @else
        <img src="{{ secure_asset('/images/person.jpeg') }}" alt="一般ユーザー画像" title="一般ユーザー">
    @endif
</p>
