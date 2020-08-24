{{-- drama.dramaID.review.editにて利用 --}}

<div class="form-group col-sm-6 mb-2 {{ $order }}">
    <label for="{{ $evaluation }}" class="control-label bg-evaluation">{{ $item }}の評価
        <select class="original-form-control" id="{{ $evaluation }}" name="{{ $evaluation }}">
            <option value="" @if( $evaluation_value == null && old($evaluation) == null) selected @endif>--</option>
            @for($i = 10; $i > 1; $i--)
                <option value="{{ $i/2 }}" @if(old($evaluation) == $i/2) selected @elseif(($evaluation_value)== $i/2  && old($evaluation) == null) selected @endif>{{ sprintf('%.1f', $i/2) }}</option>
            @endfor
        </select>
    </label>
</div>
