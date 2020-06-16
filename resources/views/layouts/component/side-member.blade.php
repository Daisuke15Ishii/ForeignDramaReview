{{--　会員のサイドバー　--}}
{{--　※会員ログイン状態のときのみ利用可能　--}}

<div class="">
    <div class="">
        <img src="" alt="会員のアイコン">
    </div>
    
    <div class="">
        <span class="">{{ Auth::user()->name }}さん</span><br>
        
        {{--　会員情報等から情報を引っ張ってくる(保留)　--}}
        【↓↓会員情報等から情報を引っ張ってくるが現在は手入力(保留)↓↓】<br>
        20代・男性<br>
        フォロー：10人　　フォロワー：10人<br>
        レビュー投稿数：100<br>
        いいね取得総数：100<br>
        <a href="#">プロフィールの表示確認</a><br>
        <a href="#">プロフィール変更</a><br>
        アカウント登録日：2020年6月14日
    </div>
    
    <div class="">
        <div class="">
            <span class="">{{ Auth::user()->name }}さんの作品</span>
            <ul>
                <li><a href="#">すべての作品(100)</a></li>
                <li><a href="#">お気に入り(100)</a></li>
                <li><a href="#">未視聴(100)</a></li>
                <li><a href="#">視聴中(100)</a></li>
                <li><a href="#">視聴済(100)</a></li>
                <li><a href="#">視聴断念(100)</a></li>
                <li><a href="#">未分類(100)</a></li>
            </ul>
        </div>
        <div class="">
            <span class="">その他</span>
            <ul>
                <li><a href="#">通知一覧</a></li>
                <li><a href="#">レビュー一覧</a></li>
                <li><a href="#">いいねしたレビュー一覧</a></li>
                <li><a href="#">フォロー一覧</a></li>
                <li><a href="#">フォロワー一覧</a></li>
                <li><a href="#">作品の追加リクエスト</a></li>
                <li><a href="#">設定変更</a></li>
            </ul>
        </div>
    </div>
</div>