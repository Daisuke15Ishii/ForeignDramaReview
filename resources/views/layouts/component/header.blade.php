<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')｜洋ドラ会議</title>
        
        {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css" />

        {{-- Laravel標準で用意されているCSS＋自分で作成したSCSS --}}
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">

    </head>
    @if($bgcolor == 'none')
        <body>
    @else
        <body class="bg-otherscolor">
    @endif
        {{-- ナビゲーションバー --}}
        <nav class="navbar navbar-expand-md navbar-light bg-orange fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">洋ドラ会議</a>
                <span class="navbar-text">
                    @auth
                        <a href="{{ url('/user/mypage') }}" class="login-out">マイページ</a>
                    @else
                        <a  href="{{ route('login') }}" class="login-out">ログイン</a>
                    @endauth
                </span>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navimenu" aria-controls="navimenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse justify-content-end" id="navimenu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">トップページ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('search\SearchController@index') }}">作品条件検索</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('review_index') }}">最新レビュー</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ranking_index') }}">おすすめドラマ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}">サイト情報</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <header>
            <div class="container">
                {{-- タイトルロゴ、ログイン・ログアウトボタン、検索バー--}}
                <div class="row">
                    <div class="col-md-3">
                        <a class="titlerogo" href="{{ url('/') }}">
                            <img src="{{ asset('images/titlerogo.png') }}" alt="洋ドラ会議ロゴ">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            {{-- ログイン・ログアウト --}}
                            <div class="col-md-12 mx-auto">
                                <p class="text-left">海外ドラマをレビューして盛り上げよう！</p>
                                <div class="float-right">
                                    <!-- Authentication Links -->
                                    {{-- ログインしていなかったら「ゲストさん」「新規登録画面へのリンク」「ログインボタン」を表示 --}}
                                    @guest
                                        <p>ようこそ！ゲストさん</p>
                                        <p><a href="{{ route('register') }}" class="font-weight-bold">新規アカウント登録</a></p>
                                        <a class="login-out" href="{{ route('login') }}">ログイン</a>
                                    {{-- ログインしていたら「ユーザー名」「マイページへのリンク」「ログアウトボタン」を表示 --}}
                                    @else
                                        <p>ようこそ！<span class="font-italic">{{ Auth::user()->penname }}</span>さん</p>
                                        <p><a href="{{ url('/user/mypage') }}" class="font-weight-bold">マイページ</a></p>
                                        <a href="{{ route('logout') }}" class="login-out"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            ログアウト
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @endguest
                                </div>
                            </div>
                            
                            {{-- 検索バー --}}
                            <div class="col-12">
                                <form class="row header-search-group" action="{{ action('search\SearchController@result') }}" method="get">
                                    @csrf
                                    <div class="col-4 mx-0 px-0">
                                        <select class="header-search-select header-search-input text-right" name="mode" id="mode">
                                            <option value="modetitle">作品名から検索</option>
                                            <option value="modecomment">レビューコメントから検索</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mx-0 px-0">
                                        <input type="text" class="header-search-select header-search-input" name="cond_title" value="" autocomplete="cond_title">
                                    </div>
                                    <div class="col-2 mx-0 px-0">
                                        <button type="submit" class="btn btn-primary">検索</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- パンくずリスト(保留) --}}
            </div>
        </header>
