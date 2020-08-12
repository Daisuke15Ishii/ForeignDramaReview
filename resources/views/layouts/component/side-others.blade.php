{{--　他ユーザーのサイドバー　--}}

<div class="row m-0 p-0">
    <div class="col-lg-12 col-4 m-0 p-0 mx-auto">
        <div class="rect-wrap">
            <div class="rect">
                @if(isset($others->image))
                    <img src="{{ secure_asset($others->image) }}" alt="{{ $others->penname}}さんアイコン画像" title="{ $others->penname }さん">
                @else
                    <img src="{{ secure_asset('/images/person.jpeg') }}" alt="一般ユーザー画像" title="一般ユーザー">
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-8 m-0 p-0">
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
        </p>
            
        {{-- follow機能--}}
        @include('layouts.component.createfollowbutton', ['class' => ''])

        <p>
            {{ floor(Carbon\Carbon::parse($others->birth)->age / 10) * 10 }}代
            @if($others->gender == 'male')
                ・男性
            @elseif($others->gender == 'female')
                ・女性
            @endif
        </p>
        <p>フォロー：<span class="font-weight-bold">{{ $others->follows()->count() }}</span>人　　フォロワー：<span class="font-weight-bold">{{ $others->followed()->count() }}</span>人</p>
        <p>レビュー投稿数：<span class="font-weight-bold">{{ $others->reviews()->wherenotnull('total_evaluation')->count() }}</span></p>{{-- マイページに作品登録しただけのレビューを除く --}}
        <p>(総合評価平均：<span class="font-weight-bold">{{ sprintf('%.1f',$others->reviews()->avg('total_evaluation')) }}点)</span></p>
        <p>
            いいね取得総数：<span class="font-weight-bold">
            {{ $iike = App\Like::whereHas('review', function($q) use($others){
                $q->where('user_id', '=',  $others->id);
                })->count()
            }}</span>
        </p>
        <p>アカウント登録日：{{ date('Y年m月d日', strtotime($others->created_at)) }}</p>
    </div>
    <div class="col-12 m-0 p-0">
        <div class="sidebar-menu">
            <p>{{ $others->penname }}さんの作品</p>
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
        
            <p>その他</p>
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

