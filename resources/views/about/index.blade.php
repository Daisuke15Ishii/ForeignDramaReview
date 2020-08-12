{{-- layouts/front.blade.phpを読み込む --}}
@extends('layouts.front')

@section('title', 'サイト概要')

{{-- front.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<div class="col-lg-8 mx-auto content-frame mb-4">
    <h1 class="content-title">サイト概要</h1>
    <div class="px-4 pt-1 pb-3">
        <p class="alert">(注意)当サイトは、現在準備中のため、ご利用はお控えください。</p>
        @include('layouts.component.about')

        <p>当サイトは2020年8月よりサービスを開始しており、機能および作品を順次充実させていく予定です。 </p>
        <p>追加機能および追加作品については、<a href="{{ url('/about/info') }}">お知らせ</a>をご覧ください。 </p>
        <p >また、掲載する作品のご希望がございましたら、マイページの「作品の追加リクエスト(準備中)」よりお問合せください。 </p>
        
        <p class="mb-3">また、当サイトでは、利用者の皆様が快適にご利用できる環境づくりを心がけています。</p>
        <p>つきましては、ご利用前に下記の利用規約等を一読のうえ、サービスのご利用をお願いいたします。</p>
        <p><a href="{{ url('/about/manual') }}">マニュアルはこちら</a></p>
        <p><a href="{{ url('/about/terms-of-service/') }}">利用規約等はこちら</a></p>
        
        <ul class="mb-3 text-right">
            <li>運営者：だいすけ</li>
            <li>所在地：埼玉県</li>
            <li>連絡先：<a href="#">だいすけ</a>(twitter)</a></li>
            <li><a href="{{ url('/about/contact') }}">お問合せはこちら</a></li>
        </ul>
    </div>
</div>
@endsection
