{{-- layouts/front.blade.phpを読み込む --}}
@extends('layouts.front')

@section('title', 'サイト概要')

{{-- front.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="">
                    <h1>サイト概要</h1>
                </div>
                <div class="row">
                    <div class="col-md-12 mx-auto bg-white">
                        @include('layouts.component.about')

                        <p>当サイトは2020年8月よりサービスを開始しており、機能および作品を順次充実させていく予定です。<br>
                        追加機能および追加作品については、<a href="{{ url('/about/info') }}">お知らせ</a>をご覧ください。<br>
                        また、掲載する作品のご希望がございましたら、マイページの「作品の追加リクエスト(準備中)」よりお問合せください。 </p>
                        
                        <p>また、当サイトでは、利用者の皆様が快適にご利用できる環境づくりを心がけています。<br>
                        つきましては、ご利用前に下記の利用規約等を一読のうえ、サービスのご利用をお願いいたします。<br>
                        <a href="{{ url('/about/manual') }}">マニュアルはこちら</a><br>
                        <a href="{{ url('/about/terms-of-service/') }}">利用規約等はこちら</a></p>
                        
                        <ul>
                            <li>運営者：だいすけ</li>
                            <li>所在地：埼玉県</li>
                            <li>連絡先：<a href="#">だいすけ</a>(twitter)</a></li>
                            <li><a href="{{ url('/about/contact') }}">お問合せはこちら</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
