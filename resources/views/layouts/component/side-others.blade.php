{{--　他ユーザーのサイドバー　--}}

<div class="">
    <div class="">
        @if(isset($others->image_path))
            <p class=""><img src="{{ secure_asset($others->image_path) }}" alt="{{ $others->penname}}さんアイコン画像" title="{ $others->penname }さん"></p>
        @else
            <p class=""><img src="{{ secure_asset('/images/person.jpeg') }}" alt="一般ユーザー画像" title="一般ユーザー"></p>
        @endif
    </div>
    
    <div class="">
        <p>
            {{ $others->penname }}さん
            {{-- follow機能--}}
            @auth
                @if ( $others->id !== Auth::id() )
                    <form action="{{ route('Others_follow', ['userID' => $others->id]) }}" method="POST" name="follow">
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
                <li><a href="{{ url('/user/userID/drama') }}">すべての作品(100)</a></li>
                <li><a href="{{ url('/user/userID/drama/favorite') }}">お気に入り(100)</a></li>
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
                <li><a href="#">レビュー一覧</a></li>
                <li>
                    @if(App\Like::where('user_id', \Auth::id())->count() !== 0)
                        <a href="{{ route('like_index') }}">いいねしたレビュー一覧({{ App\Like::where('user_id', \Auth::id())->count() }})</a>
                    @else
                        いいねしたレビュー一覧
                    @endif
                </li>
                <li><a href="#">フォロー一覧</a></li>
                <li><a href="#">フォロワー一覧</a></li>
            </ul>
        </div>
    </div>
</div>