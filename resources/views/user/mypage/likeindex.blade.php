@extends('layouts.member')

@section('title',  'いいねしたレビュー一覧｜' . Auth::user()->penname . 'さんのマイページ')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto bg-white mb-4">
            <h2>いいねしたレビュー一覧({{ $alllikes }}件)<span class="">({{ $likes->firstitem() }}~{{ $likes->lastitem() }}件目を表示)</span></h2>

            {{ $likes->appends(request()->input())->links() }}
            
            @foreach($likes as $like)
                {{-- マージンがマイナスになってて表示がおかしいので後で修正 --}}
                <div class="row small my-3">

                    {{-- 作品レビュー側(左側) --}}
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
                                            <a href="{{ route('dramaID_index', ['drama_id' => $like->review()->first()->drama()->first()->id]) }}"><img src="{{ secure_asset($like->review()->first()->drama()->first()->image_path) }}" alt="{{ $like->review()->first()->drama()->first()->title }}画像"></a>
                                        </p>
                                    </div>
                                    <div class="col-md-8 p-0 m-0">
                                        <p class="p-0 m-0"><a href="{{ route('dramaID_index', ['drama_id' => $like->review()->first()->drama()->first()->id]) }}">{{ $like->review()->first()->drama()->first()->title }} シーズン{{ $like->review()->first()->drama()->first()->season }}</a></p>
                                        <p class="p-0 m-0">総合評価：{{ $like->review()->first()->total_evaluation }}点<img src="#" alt="評価の星マーク"></p>
                                        <p class="p-0 m-0">
                                            {{-- レビュータイトル・本文が投稿されている場合のみタイトル等を表示--}}
                                            @if(isset($like->review()->first()->review_title))
                                                「<a href="{{ route('reviewID_index', ['drama_id' => $like->review()->first()->drama()->first()->id, 'review_id' => $like->review()->first()->id]) }}">{{ \Str::limit($like->review()->first()->review_title, 50) }}</a>」
                                            @else
                                                「<a href="{{ route('reviewID_index', ['drama_id' => $like->review()->first()->drama()->first()->id, 'review_id' => $like->review()->first()->id]) }}">コメントなし</a>」
                                            @endif
                                            @if ($like->review()->first()->spoiler_alert == 1)
                                                <span class="spoiler_alert">ネタバレ有</span>
                                            @endif
                                        </p>
                                        <p class="p-0 m-0">更新日：{{ date('Y年m月d日H時i分', strtotime($like->review()->first()->updated_at)) }} / {{ $like->review()->first()->likes()->count() }}いいね</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- 投稿者側(右側) --}}
                    <div class="col-md-6 mx-auto">
                        <div class="row">
                            <div class="col-md-11 mx-auto bg-warning border p-0 m-0">
                                <div class="row p-0 m-0">
                                    <div class="col-md-2 border-right p-0 m-0">
                                        <p>
                                            投稿者
                                        </p>
                                    </div>
                                    <div class="col-md-2 p-0 m-0">
                                        @if(isset($like->review()->first()->user()->first()->image))
                                            <p class=""><img src="{{ secure_asset($like->review()->first()->user()->first()->image) }}" class="person" alt="{{ $like->review()->first()->user()->first()->penname}}さんアイコン画像" title="{ $like->review()->first()->user()->first()->penname }さん"></p>
                                        @else
                                            <p class=""><img src="{{ secure_asset('/images/person.jpeg') }}" class="person" alt="一般ユーザー画像" title="一般ユーザー"></p>
                                        @endif
                                    </div>
                                    <div class="col-md-8 p-0 m-0">
                                        <p class="p-0 m-0"><a href="{{ route('others_home', ['userID' => $like->review()->first()->user()->first()->id]) }}">{{ $like->review()->first()->user()->first()->penname }}</a></p>
                                        <p class="p-0 m-0">
                                            {{ floor(Carbon\Carbon::parse($like->review()->first()->user()->first()->birth)->age / 10) * 10 }}代
                                            @if($like->review()->first()->user()->first()->gender == 'male')
                                                ・男性
                                            @elseif($like->review()->first()->user()->first()->gender == 'female')
                                                ・女性
                                            @endif
                                        </p>
                                        <p class="p-0 m-0">レビュー投稿数：
                                            {{ $like->review()->first()->user()->first()->reviews()->wherenotnull('total_evaluation')->count() }}
                                        </p>
                                        <p class="p-0 m-0">(総合評価平均：{{ sprintf('%.1f', $like->review()->first()->user()->first()->reviews()->avg('total_evaluation')) }}点)</p>
                                        <p class="p-0 m-0">
                                            いいね取得総数
                                            {{ $iike_total = App\Like::whereHas('review', function($q) use($like){
                                                $q->where('user_id', '=',  $like->review()->first()->user()->first()->id);
                                                })->count()
                                            }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
            {{ $likes->appends(request()->input())->links() }}
        </div>
    </div>
@endsection
