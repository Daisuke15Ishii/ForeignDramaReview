@extends('layouts.member')

@section('title', 'お気に入りの作品｜マイページ')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto bg-white mb-4">
            <h2>お気に入りの作品(変数でマイページの作品数を表示)<span class="">(1～20件目を表示)</span></h2>
            
            {{-- 右寄せしたい --}}
            <form method="POST" action="{{ url('/user/mypage/drama/favorite') }}">
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
                    {{-- マージンがマイナスになってて表示がおかしいので後で修正 --}}
                    
                    第{{ $i }}位
                    余白がたくさんあるので機能追加やデザインを検討中(一言コメント追加？)
                    @include('layouts.component.favoritedramaindex')
                </div>
            @endfor
            
            ここにペジネーション配置
        </div>
        
    </div>
@endsection
