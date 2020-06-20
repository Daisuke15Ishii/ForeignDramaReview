<footer class="bg-info">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a class="" href="{{ url('/') }}">
                    <img src="" alt="ロゴとサイトタイトル">
                </a>
            </div>
            {{-- 各種ナビゲーション --}}
            <div class="col-md-9">
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="{{ url('/') }}">トップページ</a></li>
                    <li class="list-inline-item"><a href="#">マイページ</a>
                        <ul>
                            <li><a href="{{ route('register') }}">新規アカウント登録</a></li>
                        </ul>
                    </li>
                    <li class="list-inline-item"><a href="{{ url('/search') }}">作品条件検索</a>
                    <li class="list-inline-item"><a href="#">最新レビュー</a>
                    <li class="list-inline-item"><a href="#">おすすめドラマ</a>
                    <li class="list-inline-item"><a href="{{ url('/about') }}">サイト情報</a>
                        <ul>
                            <li><a href="{{ url('/about') }}">サイト概要</a></li>
                            <li><a href="{{ url('/about/info') }}">お知らせ</a></li>
                            <li><a href="#">ガイドライン</a></li>
                            <li><a href="{{ url('/about/terms-of-service/') }}">利用規約等</a></li>
                            <li><a href="{{ url('/about/contact') }}">お問合せ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="">
        <small>&copy; 2020 daisuke All rights reserved.</small>
    </div>
</footer>