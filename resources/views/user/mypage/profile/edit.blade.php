@extends('layouts.member')

{{-- データベース作成後にタイトル修正予定 --}}
@section('title', 'プロフィール変更｜洋ドラ会議(仮)')

{{-- データベース作成後に諸々修正予定(とりあえず文章を手入力) --}}
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 mx-auto bg-warning">
                    {{-- post送信されて正しく変更が保存された場合は、「プロフィールの変更が完了しました。」とメッセージを表示。issetで実装かな？ --}}
                    <h1>プロフィールの変更</h1>
                    <form method="POST" action="{{ url('/user/mypage/profile/edit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-11 mx-auto">
                                <p>{{ Auth::user()->name }}さんのプロフィールを自由に入力してください。</p>
                                <textarea name="" cols="65" rows="15" id="" class="bg-white"></textarea>
                            </div>
                            <input type="submit" value="変更内容を保存" class="mx-auto my-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
@endsection
