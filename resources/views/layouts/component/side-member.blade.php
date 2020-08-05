{{--　会員のサイドバー　--}}
{{--　※会員ログイン状態のときのみ利用可能　--}}

<div class="">
    <div class="">
        @if(isset(Auth::user()->image))
            <p class="sideperson"><img src="{{ secure_asset(Auth::user()->image) }}" alt="{{ Auth::user()->penname}}さんアイコン画像" title="{ Auth::user()->penname }さん"></p>
        @else
            <p class="sideperson"><img src="{{ secure_asset('/images/person.jpeg') }}" alt="一般ユーザー画像" title="一般ユーザー"></p>
        @endif
    </div>
    
    <div class="">
        <p><a href="{{ url('/user/mypage') }}">{{ Auth::user()->penname }}さん</a></p>
        <p>
            {{ floor(Carbon\Carbon::parse(Auth::user()->birth)->age / 10) * 10 }}代
            @if(Auth::user()->gender == 'male')
                ・男性
            @elseif(Auth::user()->gender == 'female')
                ・女性
            @endif
        </p>
        <p>フォロー：{{ Auth::user()->follows()->count() }}人　　フォロワー：{{ Auth::user()->followed()->count() }}人</p>
        <p>レビュー投稿数：{{ Auth::user()->reviews()->wherenotnull('total_evaluation')->count() }}</p>{{-- マイページに作品登録しただけのレビューを除く --}}
        <p>(総合評価平均：{{ sprintf('%.1f',Auth::user()->reviews()->avg('total_evaluation')) }}点)</p>
        <p>
            いいね取得総数
            {{ $iike = App\Like::whereHas('review', function($q){
                $q->where('user_id', '=',  Auth::id());
                })->count()
            }}
        </p>
        <p><a href="{{ route('others_home', ['userID' => Auth::id()]) }}">プロフィールの表示確認</a></p>
        <p><a href="{{ route('profile_edit') }}">プロフィール変更</a></p>
        <p>アカウント登録日：{{ date('Y年m月d日', strtotime(Auth::user()->created_at)) }}</p>
    </div>
    
    <div class="">
        <div class="">
            <span class="">{{ Auth::user()->penname }}さんの作品</span>
            <ul>
                <li>
                    @if(Auth::user()->favoritesDrama()->count() !== 0)
                        <a href="{{ route('my_drama', ['categorize' => 'all']) }}">すべての作品({{ Auth::user()->favoritesDrama()->count() }})</a>
                    @else
                        すべての作品({{ Auth::user()->favoritesDrama()->count() }})
                    @endif
                </li>
                <li>
                    @if(Auth::user()->favoritesDrama()->where('favorite',1)->count() !== 0)
                        <a href="{{ route('my_favorite_drama') }}">お気に入り({{ Auth::user()->favoritesDrama()->where('favorite',1)->count() }})</a>
                    @else
                        お気に入り({{ Auth::user()->favoritesDrama()->where('favorite',1)->count() }})
                    @endif
                </li>
                <li>
                    @if(Auth::user()->favoritesDrama()->where('want',1)->count() !== 0)
                        <a href="{{ route('my_drama', ['categorize' => 'wantto']) }}">未視聴({{ Auth::user()->favoritesDrama()->where('want',1)->count() }})</a>
                    @else
                        未視聴({{ Auth::user()->favoritesDrama()->where('want',1)->count() }})
                    @endif
                </li>
                <li>
                    @if(Auth::user()->favoritesDrama()->where('watching',1)->count() !== 0)
                        <a href="{{ route('my_drama', ['categorize' => 'watching']) }}">視聴中({{ Auth::user()->favoritesDrama()->where('watching',1)->count() }})</a>
                    @else
                        視聴中({{ Auth::user()->favoritesDrama()->where('watching',1)->count() }})
                    @endif
                </li>
                <li>
                    @if(Auth::user()->favoritesDrama()->where('watched',1)->count() !== 0)
                        <a href="{{ route('my_drama', ['categorize' => 'watched']) }}">視聴済({{ Auth::user()->favoritesDrama()->where('watched',1)->count() }})</a>
                    @else
                        視聴済({{ Auth::user()->favoritesDrama()->where('watched',1)->count() }})
                    @endif
                </li>
                <li>
                    @if(Auth::user()->favoritesDrama()->where('stop',1)->count() !== 0)
                        <a href="{{ route('my_drama', ['categorize' => 'stop']) }}">視聴断念({{ Auth::user()->favoritesDrama()->where('stop',1)->count() }})</a>
                    @else
                        視聴断念({{ Auth::user()->favoritesDrama()->where('stop',1)->count() }})
                    @endif
                </li>
                <li>
                    @if(Auth::user()->favoritesDrama()->where('uncategorized',1)->count() !== 0)
                        <a href="{{ route('my_drama', ['categorize' => 'uncategorized']) }}">未分類({{ Auth::user()->favoritesDrama()->where('uncategorized',1)->count() }})</a>
                    @else
                        未分類({{ Auth::user()->favoritesDrama()->where('uncategorized',1)->count() }})
                    @endif
                </li>
            </ul>
        </div>
        <div class="">
            <span class="">その他</span>
            <ul>
                <li>通知一覧(準備中)</li>
                <li>
                    @if(App\Like::where('user_id', \Auth::id())->count() !== 0)
                        <a href="{{ route('like_index') }}">いいねしたレビュー一覧({{ App\Like::where('user_id', \Auth::id())->count() }})</a>
                    @else
                        いいねしたレビュー一覧
                    @endif
                </li>
                <li>
                    @if(App\Follow::where('user_id', \Auth::id())->count() !== 0)
                        <a href="{{ route('following_index') }}">フォロー一覧({{ App\Follow::where('user_id', \Auth::id())->count() }})</a>
                    @else
                        フォロー一覧
                    @endif
                </li>
                <li>
                    @if(App\Follow::where('following_user_id', \Auth::id())->count() !== 0)
                        <a href="{{ route('followed_index') }}">フォロワー一覧({{ App\Follow::where('following_user_id', \Auth::id())->count() }})</a>
                    @else
                        フォロワー一覧
                    @endif
                </li>
                <li>作品の追加リクエスト(準備中)</li>
                <li><a href="{{ route('setting_edit') }}">設定変更</a></li>
            </ul>
        </div>
    </div>
</div>