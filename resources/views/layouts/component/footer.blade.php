        <footer class="bg-maincolor">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a class="titlerogo" href="{{ url('/') }}">
                            <img src="{{ asset('images/titlerogo.png') }}" alt="洋ドラ会議ロゴ">
                        </a>
                    </div>
                    
                    {{-- 各種ナビゲーション --}}
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li><a href="{{ url('/') }}">トップページ</a></li>
                                    @auth
                                        <li><a href="{{ url('/user/mypage') }}">マイページ</a></li>
                                    @else
                                        <li><a href="{{ route('register') }}">新規アカウント登録</a></li>
                                    @endauth
                                    <li><a href="{{ url('/search') }}">作品条件検索</a></li>
                                    <li><a href="{{ route('review_index') }}">最新レビュー</a></li>
                                    <li><a href="{{ route('ranking_index') }}">おすすめドラマ</a></li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul>
                                    <li><a href="{{ url('/about') }}">サイト概要</a></li>
                                    <li><a href="{{ url('/about/info') }}">お知らせ</a></li>
                                    <li><a href="{{ url('/about/manual') }}">マニュアル</a></li>
                                    <li><a href="{{ url('/about/terms-of-service/') }}">利用規約等</a></li>
                                    <li><a href="{{ url('/about/contact') }}">お問合せ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="footer-bottom">
                <p class="text-center"><small>&copy; 2020 daisuke All rights reserved.</small></p>
            </div>
        </footer>