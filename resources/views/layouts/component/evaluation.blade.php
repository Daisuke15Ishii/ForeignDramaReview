{{-- component.dramapoint.indexにて利用 --}}

<div class="col-lg-6 mb-1 {{ $order }}">
    <p>{{ $item }}の評価：<span class="font-weight-bold bg-evaluation">{{ sprintf('%.2f', $evaluation) }}点
        @for($i=10; $i>=0; $i--)
            @if($evaluation >= $i/2)
                    <img class="icon-evaluation" src="{{ asset('/images/icon/star_green24_' . $i . '.png') }}" alt="{{ $item }}評価">
                @break;
            @endif
        @endfor
    </span></p>
</div>
