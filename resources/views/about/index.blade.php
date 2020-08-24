@extends('layouts.front')

@section('title', 'サイト概要｜')

@section('content')
<div class="col-lg-8 mx-auto content-frame mb-4">
    <h1 class="content-title">サイト概要</h1>
    <div class="px-4 pt-1 pb-3">
        @include('layouts.component.about')

        <p>当サイトは2020年8月よりサービスを開始しており、機能および作品を順次充実させていく予定です。 </p>
        <p>追加機能および追加作品については、<a href="{{ url('/about/info') }}">お知らせ</a>をご覧ください。 </p>
        <p >また、掲載する作品のご希望がございましたら、マイページの「作品の追加リクエスト(準備中)」よりお問合せください。 </p>
        
        <p class="mb-3">また、当サイトでは、利用者の皆様が快適にご利用できる環境づくりを心がけています。</p>
        <p>つきましては、ご利用前に下記の利用規約等を一読のうえ、サービスのご利用をお願いいたします。</p>
        <p><a href="{{ url('/about/manual') }}">マニュアルはこちら</a></p>
        <p><a href="{{ url('/about/terms-of-service/') }}">利用規約等はこちら</a></p>
        
        @include('layouts.component.address', ['contact' => 'yes'])
    </div>
</div>
@endsection
