{{-- component.dramaindex.indexにて利用 --}}
{{-- component.dramapoint.indexにて利用 --}}
{{-- component.review.indexにて利用 --}}
{{-- component.mypage.dramaindexにて利用 --}}
{{-- user.mypage.likeindexにて利用 --}}

@for($i=0; $i<=10; $i++)
    @if($total_evaluation == 0)
            <img class="icon-total-evaluation" src="{{ asset('/images/icon/star_green24_' . $i . '.png') }}" alt="評価" @if($size !== "") style="height: {{ $size }}; width: auto;" @endif>
        @break;
    @elseif($total_evaluation <= $i*10)
            <img class="icon-total-evaluation" src="{{ asset('/images/icon/star_green24_' . $i . '.png') }}" alt="評価" @if($size !== "") style="height: {{ $size }}; width: auto;" @endif>
        @break;
    @endif
@endfor
