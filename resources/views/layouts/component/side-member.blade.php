{{--　会員のサイドバー　--}}
{{--　※会員ログイン状態のときのみ利用可能　--}}

<div class="">
    <div class="">
        @if(isset(Auth::user()->image_path))
            <p class=""><img src="{{ secure_asset(Auth::user()->image_path) }}" alt="{{ Auth::user()->penname}}さんアイコン画像" title="{ Auth::user()->penname }さん"></p>
        @else
            <p class=""><img src="{{ secure_asset('/images/person.jpeg') }}" alt="一般ユーザー画像" title="一般ユーザー"></p>
        @endif
    </div>
    
    <div class="">
        <p>{{ Auth::user()->penname }}さん</p>
        <p>
            {{ round(Carbon\Carbon::parse(Auth::user()->birth)->age,-1)}}代
            @if(Auth::user()->gender == 'male')
                ・男性
            @elseif(Auth::user()->gender == 'female')
                ・女性
            @endif
        </p>
        <p>フォロー：{{ Auth::user()->follows()->count() }}人　　フォロワー：{{ Auth::user()->followed()->count() }}人</p>
        <p>レビュー投稿数：{{ Auth::user()->reviews()->wherenotnull('total_evaluation')->count() }}</p>{{-- マイページに作品登録しただけのレビューを除く --}}
        <p>
            いいね取得総数：{{-- 取得したいデータが取れていないので修正予定 --}}
            {{ $iine = Auth::user()->reviews()->whereHas('likes', function($q){
                $q->where('user_id', '=',  Auth::user()->id);
                })->count()
            }}
        </p>
        <p><a href="#">プロフィールの表示確認</a></p>
        <p><a href="{{ url('/user/mypage/profile/edit') }}">プロフィール変更</a></p>
        <p>アカウント登録日：2020年6月14日</p>
    </div>
    
    <div class="">
        <div class="">
            <span class="">{{ Auth::user()->name }}さんの作品</span>
            <ul>
                <li><a href="{{ url('/user/mypage/drama') }}">すべての作品(100)</a></li>
                <li><a href="{{ url('/user/mypage/drama/favorite') }}">お気に入り(100)</a></li>
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
                <li><a href="{{ url('/user/mypage/setting/edit') }}">設定変更</a></li>
            </ul>
        </div>
    </div>
</div>