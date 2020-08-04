@extends('layouts.member')

@section('title',  'フォロー中のユーザー一覧｜' . Auth::user()->penname . 'さんのマイページ')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto bg-white mb-4">
            <h2>いいねしたレビュー一覧({{ $allfollowings }}件)<span class="">({{ $followings->firstitem() }}~{{ $followings->lastitem() }}件目を表示)</span></h2>

            {{ $followings->appends(request()->input())->links() }}
            
            @foreach($followings as $following)
                {{-- マージンがマイナスになってて表示がおかしいので後で修正 --}}
                <div class="row small my-3">

                    {{-- 投稿者側(左側) --}}
                    <div class="col-md-6 mx-auto">
                        <div class="row">
                            <div class="col-md-11 mx-auto bg-warning border p-0 m-0">
                                <div class="row p-0 m-0">
                                    <div class="col-md-2 border-right p-0 m-0">
                                    </div>
                                    <div class="col-md-2 p-0 m-0">
                                        @if(isset($following->following()->first()->image_path))
                                            <p class=""><img src="{{ secure_asset($following->following()->first()->image_path) }}" class="person" alt="{{ $following->following()->first()->penname}}さんアイコン画像" title="{ $following->following()->first()->penname }さん"></p>
                                        @else
                                            <p class=""><img src="{{ secure_asset('/images/person.jpeg') }}" class="person" alt="一般ユーザー画像" title="一般ユーザー"></p>
                                        @endif
                                    </div>
                                    <div class="col-md-8 p-0 m-0">
                                        <p class="p-0 m-0"><a href="{{ route('others_home', ['userID' => $following->following()->first()->id]) }}">{{ $following->following()->first()->penname }}</a></p>
                                        <p class="p-0 m-0">
                                            {{ floor(Carbon\Carbon::parse($following->following()->first()->birth)->age / 10) * 10 }}代
                                            @if($following->following()->first()->gender == 'male')
                                                ・男性
                                            @elseif($following->following()->first()->gender == 'female')
                                                ・女性
                                            @endif
                                        </p>
                                        <p class="p-0 m-0">レビュー投稿数：
                                            {{ $following->following()->first()->reviews()->wherenotnull('total_evaluation')->count() }}
                                        </p>
                                        <p class="p-0 m-0">(総合評価平均：{{ sprintf('%.1f', $following->following()->first()->reviews()->avg('total_evaluation')) }}点)</p>
                                        <p class="p-0 m-0">
                                            いいね取得総数
                                            {{ $iike_total = App\Like::whereHas('review', function($q) use($following){
                                                $q->where('user_id', '=',  $following->following()->first()->id);
                                                })->count()
                                            }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    {{-- 作品レビュー側(右側) --}}
                    <div class="col-md-6 mx-auto">
                        <div class="row">
                            <div class="col-md-11 mx-auto bg-warning border p-0 m-0">
                                <div class="row p-0 m-0">
                                    <div class="col-md-2 border-right p-0 m-0">
                                        <p>
                                            作品レビュー
                                        </p>
                                    </div>
                                    <div class="col-md-2 p-0 m-0">
                                        <p class="mypageDrama">
                                            <a href="{{ route('dramaID_index', ['drama_id' => App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->drama_id]) }}"><img src="{{ secure_asset(App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->image_path) }}" alt="{{ App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->title }}画像"></a>
                                        </p>
                                    </div>
                                    <div class="col-md-8 p-0 m-0">
                                        <p class="p-0 m-0"><a href="{{ route('dramaID_index', ['drama_id' => App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->drama_id]) }}">{{ App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->drama()->first()->title }} シーズン{{ App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->drama()->first()->season }}</a></p>
                                        <p class="p-0 m-0">総合評価：{{ App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->total_evaluation }}点<img src="#" alt="評価の星マーク"></p>
                                        <p class="p-0 m-0">
                                            {{-- レビュータイトル・本文が投稿されている場合のみタイトル等を表示--}}
                                            @if(isset(App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->review_title))
                                                「<a href="{{ route('reviewID_index', ['drama_id' => App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->drama_id, 'review_id' => App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->id]) }}">{{ \Str::limit(App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->review_title, 50) }}</a>」
                                            @else
                                                「<a href="{{ route('reviewID_index', ['drama_id' => App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->drama_id, 'review_id' => App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->id]) }}">コメントなし</a>」
                                            @endif
                                            @if (App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->spoiler_alert == 1)
                                                <span class="spoiler_alert">ネタバレ有</span>
                                            @endif
                                        </p>
                                        <p class="p-0 m-0">更新日：{{ date('Y年m月d日H時i分', strtotime(App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->updated_at)) }} / {{ App\Review::where('user_id', $following->following()->first()->id)->wherehas('favorite', function($q){$q->where('favorite',1);})->orderby('total_evaluation', 'desc')->first()->likes()->count() }}いいね</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
            
            {{ $followings->appends(request()->input())->links() }}
        </div>
    </div>
@endsection
