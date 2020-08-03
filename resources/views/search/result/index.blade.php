@extends('layouts.front')

@section('title', '検索結果')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto bg-white">
                <h1>"{{ $cond_title }}"の検索結果{{ $alldrama->count() }}件</h1><span class="">({{ $dramas->firstitem() }}~{{ $dramas->lastitem() }}件目を表示)</span>
                <div class="row">
                    <div class="col-md-4 float-right">
                        {{ $dramas->appends(request()->input())->links() }}
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <form method="get" action="{{ route('search_result_order') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-9 text-md-right">
                                    <select name="sortby" class="" id="sortby">
                                        <option value="create_desc" @if($sortby=='create_desc') selected @endif>新着順</option>
                                        <option value="onair_desc" @if($sortby=='onair_desc') selected @endif>公開日が新しい順</option>
                                        <option value="onair_asc" @if($sortby=='onair_asc') selected @endif>公開日が古い順</option>
                                        <option value="title_asc" @if($sortby=='title_asc') selected @endif>タイトル昇順</option>
                                        <option value="title_desc" @if($sortby=='title_desc') selected @endif>タイトル降順</option>
                                        <option value="total_evaluation_desc" @if($sortby=='total_evaluation_desc') selected @endif>総合評価が高い順(未実装)</option>
                                        <option value="total_evaluation_asc" @if($sortby=='total_evaluation_asc') selected @endif>総合評価が低い順(未実装)</option>
                                        <option value="registers_desc" @if($sortby=='registers_desc') selected @endif>マイページ登録数が多い順</option>
                                    </select>
                                </div>
                                <div class="col-md-3 text-md-left">
                                    <input type="submit" value="並び替え">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11 mx-auto">
                        @foreach($dramas as $drama )
                            @include('layouts.component.dramaindex')
                        @endforeach
                        
                        <p class="float-right">
                            {{ $dramas->appends(request()->input())->links() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
