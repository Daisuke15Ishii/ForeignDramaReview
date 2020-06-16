<footer>
    <div class="">
        {{-- divでコンテンツ幅を指定 --}}
        <div class="">
            <div class="">
                <a class="" href="{{ url('/') }}">
                    <img src="" alt="ロゴとサイトタイトル">
                </a>
            </div>
            {{-- 各種ナビゲーション --}}
            <div class="">
                <ul>
                    <li><a href="{{ url('/') }}">トップページ</a></li>
                    <li><a href="#">マイページ</a>
                        <ul>
                            <li><a href="{{ route('register') }}">新規アカウント登録</a></li>
                        </ul>
                    </li>
                    <li><a href="#">作品条件検索</a>
                    <li><a href="#">最新レビュー</a>
                    <li><a href="#">おすすめドラマ</a>
                    <li><a href="#">サイト情報</a>
                        <ul>
                            <li><a href="#">サイト概要</a></li>
                            <li><a href="#">お知らせ</a></li>
                            <li><a href="#">ガイドライン</a></li>
                            <li><a href="#">利用規約等</a></li>
                            <li><a href="#">お問合せ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="">
            copyright 2020 daisuke All rights reserved.
        </div>
    </div>
</footer>