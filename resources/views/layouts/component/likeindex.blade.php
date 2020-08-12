{{-- user.mypage.likeindexにて利用 --}}
{{-- user.userID.likeindexにて利用 --}}

<div class="row justify-content-center p-0 m-0">
    <div class="col-12 content-frame">
        <h1 class="content-title">
            @if($users !== "")
                {{ $users->penname }}さんがいいねしたレビュー一覧({{ $alllikes }}件)<span class="">({{ $likes->firstitem() }}~{{ $likes->lastitem() }}件目)
            @else
                いいねしたレビュー一覧({{ $alllikes }}件)({{ $likes->firstitem() }}~{{ $likes->lastitem() }}件目)
            @endif
        </h1>

        @foreach($likes as $like)
            <div class="row small mb-2 mx-0">
                <div class="col-11 mx-auto dramaindex-frame">
                    <div class="row">
                        
                        {{-- 作品レビュー側(左側) --}}
                        <div class="col-md-6 mx-auto">
                            <div class="row">
                                <div class="col-12 mx-auto solid-border p-1">
                                    <div class="row p-0 m-0">
                                        <div class="col-1 p-0 m-0">
                                            <p class="vertical-text">
                                                作品レビュー
                                            </p>
                                        </div>
                                        <div class="col-3 p-0 m-0">
                                            <p class="eyecatch">
                                                <a href="{{ route('dramaID_index', ['drama_id' => $like->review()->first()->drama()->first()->id]) }}">
                                                    <img src="{{ secure_asset($like->review()->first()->drama()->first()->image_path) }}" alt="{{ $like->review()->first()->drama()->first()->title }}画像">
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col-8 p-0 m-0">
                                            <p class="p-0 m-0"><a href="{{ route('dramaID_index', ['drama_id' => $like->review()->first()->drama()->first()->id]) }}">{{ $like->review()->first()->drama()->first()->title }} シーズン{{ $like->review()->first()->drama()->first()->season }}</a></p>
                                            <p class="p-0 m-0">総合評価：{{ $like->review()->first()->total_evaluation }}点
                                                @include('layouts.component.totalevaluation', ['total_evaluation' =>  $like->review()->first()->total_evaluation, 'size' => '0.8rem'])</span>
                                            </p>
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
                                <div class="col-12 mx-auto p-1">
                                    <div class="row p-0 m-0">
                                        <div class="col-1 p-0 m-0">
                                            <p class="vertical-text">
                                                投稿者
                                            </p>
                                        </div>
                                        <div class="col-3 p-0 m-0">
                                            <p class="eyecatch">
                                                @if(isset($like->review()->first()->user()->first()->image))
                                                    <img src="{{ secure_asset($like->review()->first()->user()->first()->image) }}" alt="{{ $like->review()->first()->user()->first()->penname}}さんアイコン画像" title="{ $like->review()->first()->user()->first()->penname }さん">
                                                @else
                                                    <img src="{{ secure_asset('/images/person.jpeg') }}" alt="一般ユーザー画像" title="一般ユーザー">
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-8 p-0 m-0">
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
                </div>
            </div>
        @endforeach
        
        <div class="col-12 mx-auto">
            {{ $likes->appends(request()->input())->links() }}
        </div>
    </div>
</div>
