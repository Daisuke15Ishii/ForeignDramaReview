{{--　他ユーザーのサイドバー　--}}

<div class="">
    <div class="">
        @if(isset($others->image))
            <p class=""><img src="{{ secure_asset($others->image) }}" alt="{{ $others->penname}}さんアイコン画像" title="{ $others->penname }さん"></p>
        @else
            <p class=""><img src="{{ secure_asset('/images/person.jpeg') }}" alt="一般ユーザー画像" title="一般ユーザー"></p>
        @endif
    </div>
    
    <div class="">
        <p>
            @guest
                <a href="{{ route('others_home', ['userID' => $others->id]) }}">{{ $others->penname }}さん</a>
            @else
                @if(Auth::id() == $others->id)
                    <a href="{{ url('/user/mypage') }}">{{ Auth::user()->penname }}さん</a>
                @else
                    <a href="{{ route('others_home', ['userID' => $others->id]) }}">{{ $others->penname }}さん</a>
                @endif
            @endguest
            
            {{-- follow機能--}}
            @auth
                @if ( $others->id !== Auth::id() )
                    <form action="{{ route('others_follow', ['userID' => $others->id]) }}" method="POST" name="follow">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="following_user_id" value="{{ $others->id }}">
                        {{-- 既にフォロー済かの判定。レビューの人がauth::user()にフォローされているか調べる --}}
                        @if (empty($others->followedUser()->where('user_id',Auth::id())->first()))
                            <input type="submit" value="フォロー" name="follow" alt="フォロー" class="follow">
                        @else
                            <input type="submit" value="フォロー解除" name="follow" alt="フォロー解除" class="follow">
                        @endif
                    </form>
                @endif
            @else
                {{-- まずはログインに遷移--}}
                <button>
                    <a href="{{ route('login') }}">フォロー</a>
                </button>
            @endauth
        </p>
        <p>
            {{ floor(Carbon\Carbon::parse($others->birth)->age / 10) * 10 }}代
            @if($others->gender == 'male')
                ・男性
            @elseif($others->gender == 'female')
                ・女性
            @endif
        </p>
        <p>フォロー：{{ $others->follows()->count() }}人　　フォロワー：{{ $others->followed()->count() }}人</p>
        <p>レビュー投稿数：{{ $others->reviews()->wherenotnull('total_evaluation')->count() }}</p>{{-- マイページに作品登録しただけのレビューを除く --}}
        <p>(総合評価平均：{{ sprintf('%.1f',$others->reviews()->avg('total_evaluation')) }}点)</p>
        <p>
            いいね取得総数
            {{ $iike = App\Like::whereHas('review', function($q) use($others){
                $q->where('user_id', '=',  $others->id);
                })->count()
            }}
        </p>
        <p>アカウント登録日：{{ date('Y年m月d日', strtotime($others->created_at)) }}</p>
    </div>
    
    <div class="">
        <div class="">
            <span class="">{{ $others->penname }}さんの作品</span>
            <ul>
                <li>
                    @if($others->favoritesDrama()->count() !== 0)
                        <a href="{{ route('others_drama', ['userID' => $others->id, 'categorize' => 'all']) }}">すべての作品({{ $others->favoritesDrama()->count() }})</a>
                    @else
                        すべての作品({{ $others->favoritesDrama()->count() }})
                    @endif
                </li>
                <li>
                    @if($others->favoritesDrama()->where('favorite',1)->count() !== 0)
                        <a href="{{ route('others_favorite_drama', ['userID' => $others->id]) }}">お気に入り({{ $others->favoritesDrama()->where('favorite',1)->count() }})</a>
                    @else
                        お気に入り({{ $others->favoritesDrama()->where('favorite',1)->count() }})
                    @endif
                </li>
                <li>
                    @if($others->favoritesDrama()->where('want',1)->count() !== 0)
                        <a href="{{ route('others_drama', ['userID' => $others->id, 'categorize' => 'wantto']) }}">観たい({{ $others->favoritesDrama()->where('want',1)->count() }})</a>
                    @else
                        観たい({{ $others->favoritesDrama()->where('want',1)->count() }})
                    @endif
                </li>
                <li>
                    @if($others->favoritesDrama()->where('watching',1)->count() !== 0)
                        <a href="{{ route('others_drama', ['userID' => $others->id, 'categorize' => 'watching']) }}">視聴中({{ $others->favoritesDrama()->where('watching',1)->count() }})</a>
                    @else
                        視聴中({{ $others->favoritesDrama()->where('watching',1)->count() }})
                    @endif
                </li>
                <li>
                    @if($others->favoritesDrama()->where('watched',1)->count() !== 0)
                        <a href="{{ route('others_drama', ['userID' => $others->id, 'categorize' => 'watched']) }}">視聴済({{ $others->favoritesDrama()->where('watched',1)->count() }})</a>
                    @else
                        視聴済({{ $others->favoritesDrama()->where('watched',1)->count() }})
                    @endif
                </li>
                <li>
                    @if($others->favoritesDrama()->where('stop',1)->count() !== 0)
                        <a href="{{ route('others_drama', ['userID' => $others->id, 'categorize' => 'stop']) }}">リタイア({{ $others->favoritesDrama()->where('stop',1)->count() }})</a>
                    @else
                        リタイア({{ $others->favoritesDrama()->where('stop',1)->count() }})
                    @endif
                </li>
                <li>
                    @if($others->favoritesDrama()->where('uncategorized',1)->count() !== 0)
                        <a href="{{ route('others_drama', ['userID' => $others->id, 'categorize' => 'uncategorized']) }}">未分類({{ $others->favoritesDrama()->where('uncategorized',1)->count() }})</a>
                    @else
                        未分類({{ $others->favoritesDrama()->where('uncategorized',1)->count() }})
                    @endif
                </li>
            </ul>
        </div>
        <div class="">
            <span class="">その他</span>
            <ul>
                <li>
                    @if(App\Like::where('user_id', $others->id)->count() !== 0)
                        <a href="{{ route('others_like_index', ['userID' => $others->id]) }}">いいねしたレビュー一覧({{ App\Like::where('user_id', $others->id)->count() }})</a>
                    @else
                        いいねしたレビュー一覧
                    @endif
                </li>
                <li>
                    @if(App\Follow::where('user_id', $others->id)->count() !== 0)
                        <a href="{{ route('others_following_index', ['userID' => $others->id]) }}">フォロー一覧({{ App\Follow::where('user_id', $others->id)->count() }})</a>
                    @else
                        フォロー一覧
                    @endif
                </li>
                <li>
                    @if(App\Follow::where('following_user_id', $others->id)->count() !== 0)
                        <a href="{{ route('others_followed_index', ['userID' => $others->id]) }}">フォロワー一覧({{ App\Follow::where('following_user_id', $others->id)->count() }})</a>
                    @else
                        フォロワー一覧
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>