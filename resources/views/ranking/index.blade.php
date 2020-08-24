@extends('layouts.front')

@section('title', 'おすすめドラマ｜')

@section('content')
{{-- search.result.indexとほぼ全て同じ。違いは「テーブルの参照元($socres,$dramas)」「並び替えの有無」「includeするときに渡す引数」 --}}
<div class="col-12 mx-auto content-frame">
    <h1 class="content-title">おすすめドラマ(総合評価ランキング)</h1>
    <div class="row main-content m-0">
        {{-- スマホ時のみ上部にペジネーション表示 --}}
        <div class="col-12 not-pc">
            {{ $scores->appends(request()->input())->links() }}
        </div>
    
        <div class="col-11 mx-auto">
            @foreach($scores as $score)
                @include('layouts.component.dramaindex', ['drama' => $score->drama()->first()])
            @endforeach

            {{ $scores->appends(request()->input())->links() }}
        </div>
    </div>
</div>
@endsection
