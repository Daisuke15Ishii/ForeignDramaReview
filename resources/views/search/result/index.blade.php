@extends('layouts.front')

@section('title', '検索結果')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto bg-white">
                <h1>"{{ $cond_title }}"の検索結果{{ $alldrama->count() }}件</h1><span class="">({{ $dramas->firstitem() }}~{{ $dramas->lastitem() }}件目を表示)</span>
                <div class="row">
                    <div class="col-md-4">
                        <select name="sortby" class="" id="sortby">
                            <option value="update_desc">投稿日が新しい順</option>
                            <option value="update_asc">投稿日時が古い順</option>
                            <option value="title_asc">タイトル昇順</option>
                            <option value="title_desc">タイトル降順</option>
                            <option value="total_evaluation_desc">総合評価が高い順(未実装)</option>
                            <option value="total_evaluation_asc">総合評価が低い順(未実装)</option>
                            <option value="like_desc">いいねが多い順</option>
                            <option value="like_asc">いいねが少ない順</option>
                        </select>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 float-right">
                        {{ $dramas->appends(request()->input())->links() }}
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
