@extends('layouts.front')

@section('title', '検索結果')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto bg-white">
                <h1>"{{ $cond_title }}"の検索結果{{ $alldrama->count() }}件</h1><span class="">(●●件目を表示)</span>
                <div class="">
                    {{-- 右に寄せたい --}}
                    {{-- value適当 --}}
                    <select name="" class="" id="">
                        <option value="created_desc" selected="selected">投稿日が新しい順</option>
                        <option value="created_asc">投稿日時が古い順</option>
                        <option value="point_asc">総合評価が高い順</option>
                        <option value="point_desc">総合評価が低い順</option>
                        <option value="like_asc">他いろいろ実装予定</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-11 mx-auto">
                        @foreach($dramas as $drama )
                            @include('layouts.component.dramaindex')
                        @endforeach
                        
                        {{ $dramas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
