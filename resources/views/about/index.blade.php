{{-- layouts/front.blade.phpを読み込む --}}
@extends('layouts.front')

{{-- front.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'サイト情報｜洋ドラ会議(仮)')

{{-- front.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="">
                    <h1>サイト概要</h1>
                </div>
                <div class="">
                    <p>当サイトは、海外ドラマ作品の評価を集約し、それらの評価を検索する場です。<br><br>
                    当サイトを利用することにより、次の体験を提供いたします。
                    <ol>
                        <li>面白い海外ドラマを探す</li>
                        <li>面白かった海外ドラマを語り合う</li>
                        <li>海外ドラマの視聴歴を管理し、自分だけのお気に入りコレクションを作成する</li>
                    </ol>
                    当サービスを提供することにより、海外ドラマの普及や活性化につながればと考えています。<br><br>
                    なお、「面白かった海外ドラマを語り合う」「海外ドラマの視聴歴を管理し、お気に入りコレクションを作る」サービスについては、無料の会員登録が必要になります。<br>
                    <a href="#">新規アカウント登録はこちら</a></p>
                    
                    <p>当サイト掲載の作品数は、順次増やしていくです。<br>
                    追加された作品については、<a href="#">お知らせ</a>をご覧ください。<br>
                    また、掲載する作品のご希望がございましたら、マイページの「作品の追加リクエスト」よりお問合せください。 </p>
                    
                    <p>また、当サイトでは、利用者の皆様が快適にご利用できる環境づくりを心がけています。<br>
                    つきましては、ご利用前に下記のガイドラインを一読のうえ、サービスのご利用をお願いいたします。<br>
                    <a href="#">ガイドラインはこちら</a><br>
                    <a href="#">利用規約・プライバシーポリシーはこちら</a></p>
                    
                    <ul>
                        <li>運営者：だいすけ</li>
                        <li>所在地：東京都</li>
                        <li><a href="{{ url('/about/contact') }}">お問合せはこちら</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
