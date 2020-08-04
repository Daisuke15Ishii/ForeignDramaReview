@extends('layouts.others')

@section('title', $others->penname . 'さんのマイページ')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto bg-white mb-4">
            <h2>{{ $others->penname }}さんのプロフィール</h2>
            @if( !empty($others->profile) )
                <p>{{ $others->profile }}</p>
            @else
                <p>よろしくお願いします。(プロフィール未設定)</p>
            @endif

            <div class="form-group row">
                <div class="col-md-12 text-md-right">
                    {{-- follow機能--}}
                    @auth
                        @if ( $others->id !== Auth::id() )
                            <form action="{{ route('others_follow', ['userID' => $others->id]) }}" method="POST" name="follow">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="following_user_id" value="{{ $others->id }}">
                                <p>
                                    {{-- 既にフォロー済かの判定。レビューの人がauth::user()にフォローされているか調べる --}}
                                    @if (empty($others->followedUser()->where('user_id',Auth::id())->first()))
                                        <input type="submit" value="フォロー" name="follow" alt="フォロー" class="follow">
                                    @else
                                        <input type="submit" value="フォロー解除" name="follow" alt="フォロー解除" class="follow">
                                    @endif
                                </p>
                            </form>
                        @endif
                    @else
                        {{-- まずはログインに遷移--}}
                        <button>
                            <a href="{{ route('login') }}">フォロー</a>
                        </button>
                    @endauth
                </div>
            </div>
        </div>
        
        <div class="col-md-12 mx-auto bg-white mb-4">
            <h2>最新投稿レビュー</h2>
            {{-- 投稿更新日が新しい順に表示 --}}
            @foreach($others->reviews()->orderBy('updated_at', 'desc')->get() as $review)
                {{-- マージンがマイナスになってて表示がおかしいので後で修正 --}}
                @if($loop->odd)
                    {{-- ループが奇数回 --}}
                    <div class="row small my-3">
                        @include('layouts.component.othersdramaindex')
                    @if($loop->last)
                        {{-- リストの最後 --}}
                        <div class="col-md-6 mx-auto">
                        </div>
                        @break
                    @endif
                @elseif($loop->even)
                    {{-- ループが偶数回 --}}
                        @include('layouts.component.othersdramaindex')
                    </div>
                @endif
                @if($loop->iteration == 4)
                    {{-- 4作品だけ表示 --}}
                    @break
                @endif
            @endforeach
            
            {{-- 「評価済」にチェックが入った状態の「すべての作品」ページへのリンク--}}
            <p class="text-right"><a href="{{ route('my_drama', ['categorize' => 'all', 'sorts' => array('review_total_evaluation')]) }}">すべての作品へ</a></p>
        </div>
        
        {{-- お気に入り作品表示 --}}
        <div class="col-md-12 mx-auto bg-white mb-4">
            <h2>お気に入り作品</h2>
            @foreach($others->reviews()->wherehas('favorite', function($q){
                $q->where('favorite', '1');
                })->orderby('total_evaluation', 'desc')->get() as $review)
                <div class="row my-3">
                    {{-- マージンがマイナスになってて表示がおかしいので後で修正 --}}
                    <div class="col-md-1">
                        第{{ $loop->iteration }}位
                    </div>
                    @include('layouts.component.othersfavoritedramaindex')
                </div>
                @if($loop->iteration == 10)
                    {{-- 10作品だけ表示 --}}
                    @break
                @endif
            @endforeach
            <p class="text-right"><a href="{{ route('my_favorite_drama') }}">お気に入り一覧へ</a></p>
        </div>
        
    </div>
@endsection
