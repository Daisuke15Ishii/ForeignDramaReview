@extends('layouts.front')

@section('title', 'お問合せ送信完了｜サイト概要｜')

@section('content')
<div class="col-lg-8 mx-auto content-frame mb-4">
    <h1 class="content-title">お問合せ送信完了</h1>
    <div class="px-4 pt-1 pb-3">
        <p>お問合せいただきありがとうございます。</p>
        <p>また、お問合せいただいた内容を管理者に通知する機能は現在準備中のため、内容確認までに時間が掛かる可能性がございます。</p>
        <p>つきましては、大変お手数ではございますが、お問合せいただいた旨を管理者までお知らせいただけますと、スムーズな対応が可能となります。</p>
        <p>何卒よろしくお願いいたします。</p>
        @include('layouts.component.address', ['contact' => 'no'])
        <p><a class="mb-3 text-right" href="{{ url('/') }}">トップページに戻る</a></p>
    </div>
</div>
@endsection
