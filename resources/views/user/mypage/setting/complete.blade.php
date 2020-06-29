@extends('layouts.member')

{{-- データベース作成後にタイトル修正予定 --}}
@section('title', '設定の変更完了｜洋ドラ会議(仮)')

{{-- データベース作成後に諸々修正予定(とりあえず文章を手入力) --}}
@section('content')
    <div class="row">
        <div class="col-md-8">
                <div class="">
                    <h1>設定の変更完了</h1>
                </div>
                <div class="">
                    <p>設定の変更が完了いたしました。<br>
                    ご登録メールアドレスに確認メールをお送りさせていただきます。</p>
                    <a class="" href="{{ url('/') }}"><img src="" alt="マイページに戻る"></a>
                </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
@endsection
