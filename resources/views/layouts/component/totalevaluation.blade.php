@for($i=0; $i<=9; $i++)
    @if($total_evaluation == 0)
            <img class="icon-total-evaluation" src="{{ asset('/images/icon/star_green24_' . $i . '.png') }}" alt="評価">
        @break;
    @elseif($total_evaluation <= $i*10)
            <img class="icon-total-evaluation" src="{{ asset('/images/icon/star_green24_' . $i . '.png') }}" alt="評価">
        @break;
    @endif
@endfor
