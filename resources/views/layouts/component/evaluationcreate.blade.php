{{-- drama.dramaID.review.createにて利用 --}}

<div class="form-group col-sm-6 mb-2 {{ $order }}">
    <label for="{{ $evaluation }}" class="control-label bg-evaluation">{{ $item }}の評価
        <select class="original-form-control" id="{{ $evaluation }}" name="{{ $evaluation }}">
            <option value="">--</option>
            @for($i = 10; $i > 0; $i--)
                <option value="{{ $i/2 }}" @if(old('{{ $evaluation }}')=='$i/2') selected @endif>{{ sprintf('%.1f', $i/2) }}</option>
            @endfor
        </select>
    </label>
</div>
