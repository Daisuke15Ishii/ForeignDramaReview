@extends('layouts.others')

{{-- データベース作成後にタイトル修正予定 --}}
@section('title', '他ユーザーのマイページ')

{{-- データベース作成後に諸々修正予定(とりあえず文章を手入力) --}}
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto bg-white mb-4">
            <h2>他ユーザーさんのプロフィール</h2>
            <p>プロフィール変更にて、ユーザーが各自入力した情報が表示される。</p>
            <p>プロフィール変更で設定していない場合は空欄で表示される。</p>
            
            {{-- 右寄せしたい --}}
            <form method="POST" action="#">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12 text-md-right">
                        <button>
                            <a href="#">フォローする</a>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="col-md-12 mx-auto bg-white mb-4">
            {{-- とりあえず手入力。データベース作成後に修正予定 --}}
            <h2>最新投稿レビュー</h2>
            データベース作成後に修正予定。現在はincludeの参照がmypageと同一blade
            {{-- とりあえず仮でfor文 --}}
            @for ($i = 1; $i <= 2; $i++)
            <div class="row small my-3">
                {{-- マージンがマイナスになってて表示がおかしいので後で修正 --}}
                @include('layouts.component.mypagedramaindex')
                @include('layouts.component.mypagedramaindex')
            </div>
            @endfor
            
            <p class="text-right"><a href="#">レビュー一覧へ</a></p>
        </div>
        
        {{-- お気に入り作品表示 --}}
        <div class="col-md-12 mx-auto bg-white mb-4">
            {{-- とりあえず手入力。データベース作成後に修正予定 --}}
            <h2>お気に入り作品</h2>
            データベース作成後に修正予定。現在はincludeの参照がmypageと同一blade
            {{-- とりあえず仮でfor文 --}}
            @for ($i = 1; $i <= 10; $i++)
                <div class="row small my-3">
                    {{-- マージンがマイナスになってて表示がおかしいので後で修正 --}}
                    
                    第{{ $i }}位
                    余白がたくさんあるので機能追加やデザインを検討中(一言コメント追加？)
                    @include('layouts.component.favoritedramaindex')
                </div>
            @endfor
            
            <p class="text-right"><a href="#">お気に入り一覧へ</a></p>
        </div>
        
    </div>
@endsection
