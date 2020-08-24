@extends('layouts.front')

@section('title', '検索結果｜')

@section('content')
<div class="col-12 mx-auto content-frame">
    <h1 class="content-title">"{{ $cond_title }}"の検索結果{{ $alldrama->count() }}件({{ $dramas->firstitem() }}~{{ $dramas->lastitem() }}件目)</h1>
    <div class="row main-content m-0">
        <div class="col-12 mb-2">
            <form method="get" action="{{ route('search_result_order') }}">
                @csrf
                <div class="order-group row">
                    <div class="col-sm-12 text-right">
                        <select name="sortby" class="order-select" id="sortby">
                            <option value="create_desc" @if($sortby=='create_desc') selected @endif>新着順</option>
                            <option value="onair_desc" @if($sortby=='onair_desc') selected @endif>公開日が新しい順</option>
                            <option value="onair_asc" @if($sortby=='onair_asc') selected @endif>公開日が古い順</option>
                            <option value="title_asc" @if($sortby=='title_asc') selected @endif>タイトル昇順</option>
                            <option value="title_desc" @if($sortby=='title_desc') selected @endif>タイトル降順</option>
                            <option value="total_evaluation_desc" @if($sortby=='total_evaluation_desc') selected @endif>総合評価が高い順(準備中)</option>
                            <option value="total_evaluation_asc" @if($sortby=='total_evaluation_asc') selected @endif>総合評価が低い順(準備中)</option>
                            <option value="registers_desc" @if($sortby=='registers_desc') selected @endif>マイページ登録数が多い順</option>
                        </select>
                        <button type="submit" class="btn btn-accent-color">ソート</button>
                    </div>
                </div>
            </form>
        </div>
        
        {{-- スマホ時のみ上部にペジネーション表示 --}}
        <div class="col-12 not-pc page-link-width">
            {{ $dramas->appends(request()->input())->links() }}
        </div>

        <div class="col-md-11 mx-auto">
            @foreach($dramas as $drama )
                @include('layouts.component.dramaindex')
            @endforeach

            {{ $dramas->appends(request()->input())->links() }}
        </div>
    </div>
</div>
@endsection
