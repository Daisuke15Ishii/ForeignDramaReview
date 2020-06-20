{{-- このページのコンテンツは全体的に見直しが必要かも(作品詳細ページと大差ないので) --}}
@extends('layouts.front')

{{-- データベース作成後にタイトル修正予定 --}}
@section('title', 'ブレイキング・バッド　シーズン1のレビュー｜洋ドラ会議(仮)')

{{-- データベース作成後に諸々修正予定(とりあえず文章を手入力) --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto bg-white">
                <h1>ブレイキング・バッド　シーズン１に関するペンネームさんのレビュー</h1>
                @include('layouts.component.dramapoint')
                
                <hr>
                <div class="row bg-warning">
                    <div class="col-md-12">
                        <div class="row">
                            <h3>ペンネームのレビュー</h3>
                        </div>
                        <div class="row">
                            @include('layouts.component.review')
                            {{-- 後でどこかにフォローボタン置いた方が良いかも --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
