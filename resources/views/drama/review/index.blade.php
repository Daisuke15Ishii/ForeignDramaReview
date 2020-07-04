@extends('layouts.front')

{{-- データベース作成後にタイトル修正予定 --}}
@section('title', '最新レビュー｜洋ドラ会議(仮)')

{{-- データベース作成後に諸々修正予定(とりあえず文章を手入力) --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto bg-white mb-4">
                {{-- とりあえず手入力。データベース作成後に修正予定 --}}
                <h2>最新レビュー一覧(1～20件目を表示)</span></h2>
                
                何らかで絞込みができたら良さそう。いいね数、総合評価、吹替・字幕など。後でいじる
                <form method="POST" action="{{ url('/drama/review') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-3 text-md-right">
                            <select name="" class="" id="">
                                <option value="title_desc" selected="selected">タイトル順</option>
                                <option value="created_desc">投稿日が新しい順</option>
                                <option value="created_asc">投稿日時が古い順</option>
                                <option value="point_asc">総合評価が高い順</option>
                                <option value="point_desc">総合評価が低い順</option>
                                <option value="like_asc">他いろいろ実装予定</option>
                            </select>
                        </div>
                    </div>
                </form>
                
                ここにペジネーション配置
                
                {{-- とりあえず仮でfor文 --}}
                @for ($i = 1; $i <= 10; $i++)
                <div class="row small my-3">
                    <div class="col-md-11 mx-auto">
                        <div class="row">
                            {{-- マージンがマイナスになってて表示がおかしいので後で修正 --}}
                            @include('layouts.component.reviewdrama')
                            @include('layouts.component.reviewuser')
                        </div>
                    </div>
                </div>
                @endfor
                
                ここにペジネーション配置
            </div>
        </div>
    </div>
@endsection
