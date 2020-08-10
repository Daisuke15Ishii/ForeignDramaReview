@for($i=0; $i<=9; $i++)
    @if($total_evaluation <= ($i+1)*10)
            <img class="icon-total-evaluation" src="{{ asset('/images/icon/star_green24_' . $i . '.png') }}" alt="評価">
        @break;
    @endif
@endfor
