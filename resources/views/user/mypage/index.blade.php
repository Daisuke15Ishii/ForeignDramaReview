@extends('layouts.member')

{{-- データベース作成後にタイトル修正予定 --}}
@section('title', 'マイページ')

{{-- データベース作成後に諸々修正予定(とりあえず文章を手入力) --}}
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto bg-white mb-4">
            <h2>{{ Auth::user()->name }}さんへの未読通知</h2>
            {{-- とりあえず手入力。データベース作成後に修正予定 --}}
            <ul>
                <li>2020/5/15　【レビュー投稿】フォローしている●●さんが「ブレイキングバッド　シーズン5」のレビューを投稿しました。</li>
                <li>2020/5/15　【いいね】だいさんさんの「ブレイキング・バッド　シーズン5」のレビューが●●さんにいいねされました。</li>
                <li>2020/5/15　【フォロー】●●さんにフォローされました。</li>
                <li>2020/5/15　【レビュー投稿】フォローしている●●さんが「ブレイキングバッド　シーズン5」のレビューを投稿しました。</li>
                <li>2020/5/15　【いいね】だいさんさんの「ブレイキング・バッド　シーズン5」のレビューが●●さんにいいねされました。</li>
                <li>2020/5/15　【フォロー】●●さんにフォローされました。</li>
                <li>2020/5/15　【レビュー投稿】フォローしている●●さんが「ブレイキングバッド　シーズン5」のレビューを投稿しました。</li>
                <li>2020/5/15　【いいね】だいさんさんの「ブレイキング・バッド　シーズン5」のレビューが●●さんにいいねされました。</li>
            </ul>
            <p class="text-right"><a href="#">通知一覧へ</a></p>
        </div>
        
        <div class="col-md-12 mx-auto bg-white mb-4">
            {{-- とりあえず手入力。データベース作成後に修正予定 --}}
            <h2>最新投稿レビュー</h2>
            
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
