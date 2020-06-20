<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>
        
        {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css" />

        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
        
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link rel="stylesheet" href="{{ secure_asset('css/front.css') }}">
    </head>
    <body>
        <header>
            <div class="" style="background: #00ff00;">
                {{-- 画面上部の帯 --}}
                <div class="container">
                    {{-- divでコンテンツ幅を指定 --}}
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <p>みんなで海外ドラマをレビューしよう</p>
                            
                            <!-- Authentication Links -->
                            {{-- ログインしていなかったら「ゲストさん」「新規登録画面へのリンク」「ログインボタン」を表示 --}}
                            @guest
                                <span class="">ゲストさん</span>
                                <a href="{{ route('register') }}">新規アカウント登録</a>
                                <a class="nav-link" href="{{ route('login') }}"><img src="" alt="ログイン"></a>
                            {{-- ログインしていたら「ユーザー名」「マイページへのリンク」「ログアウトボタン」を表示 --}}
                            @else
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}<span class="">さん</span>
                            </a>
                            <a href="#">マイページ</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <img src="" alt="ログアウト">
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @endguest
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                {{-- ロゴタイトル、検索バー --}}
                <div class="row">
                    <div class="col-md-3">
                        <a class="" href="{{ url('/') }}">
                            <img src="" alt="ロゴとサイトタイトル">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <form action="{{ url('/search/result') }}" method="get">
                            <div class="form-group row">
                                <div class="">
                                    <select name="data[mode]" class="" id="mode">
                                        <option value="searchDramaByTitle">作品名から検索</option>
                                        <option value="searchDramaByKeyword">レビューコメントから検索</option>
                                    </select>
                                </div>
                                <div class="">
                                    {{--　後でvalue=cond_titleを二重括弧で囲む　--}}
                                    <input type="text" class="form-control" name="cond_title" value=cond_title>
                                </div>
                                <div class="">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary" value="検索">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- ナビゲーションバー --}}
                <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                    <div class="container">
                        <div class="collapse navbar-collapse justify-content-center">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">トップページ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/search/') }}">作品条件検索</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">最新レビュー</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">おすすめドラマ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/about') }}">サイト情報</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                {{-- パンくずリスト --}}
                <div class="">
                    <p>
                        <a href="{{ url('/') }}">トップページ</a> &raquo;
                    </p>
                </div>
                
            </div>
        </header>
