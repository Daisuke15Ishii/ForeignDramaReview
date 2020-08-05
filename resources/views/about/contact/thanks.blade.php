{{-- layouts/front.blade.phpを読み込む --}}
@extends('layouts.front')

@section('title', 'お問合せ送信完了')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="">
                    <h1>お問合せ送信完了</h1>
                </div>
                <div class="">
                    <p>お問合せいただきありがとうございます。</p>
                    <p>また、お問合せいただいた内容を管理者に通知する機能は現在準備中のため、内容確認までに時間が掛かる可能性がございます。</p>
                    <p>つきましては、大変お手数ではございますが、お問合せいただいた旨を管理者までお知らせいただけますと、スムーズな対応が可能となります。</p>
                    <p>何卒よろしくお願いいたします。</p>
                    <ul>
                        <li>運営者：だいすけ</li>
                        <li>所在地：東京都</li>
                        <li>連絡先：<a href="#">だいすけ</a>(twitter)</a></li>
                    </ul>
                    <a class="" href="{{ url('/') }}"><img src="" alt="トップページに戻る"></a>
                </div>
            </div>
        </div>
    </div>
@endsection
