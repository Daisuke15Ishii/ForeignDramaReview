{{--  indexにて利用 --}}
{{--  drama.review.indexにて利用 --}}
{{--  component.likeindexにて利用 --}}

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
                                    <a href="{{ route('dramaID_index', ['drama_id' => $review->drama()->first()->id]) }}">
                                        <img src="{{ secure_asset($review->drama()->first()->image_path) }}" alt="{{ $review->drama()->first()->title }}画像">
                                    </a>
                                </p>
                            </div>
                            <div class="col-8 p-0 m-0">
                                <p class="p-0 m-0"><a href="{{ route('dramaID_index', ['drama_id' => $review->drama()->first()->id]) }}">{{ $review->drama()->first()->title }} シーズン{{ $review->drama()->first()->season }}</a></p>
                                <p class="p-0 m-0">総合評価：{{ $review->total_evaluation }}点
                                    @include('layouts.component.totalevaluation', ['total_evaluation' =>  $review->total_evaluation, 'size' => '0.8rem'])</span>
                                </p>
                                <p class="p-0 m-0">
                                    {{-- レビュータイトル・本文が投稿されている場合のみタイトル等を表示--}}
                                    @if(isset($review->review_title))
                                        「<a href="{{ route('reviewID_index', ['drama_id' => $review->drama()->first()->id, 'review_id' => $review->id]) }}">{{ \Str::limit($review->review_title, 50) }}</a>」
                                    @else
                                        「<a href="{{ route('reviewID_index', ['drama_id' => $review->drama()->first()->id, 'review_id' => $review->id]) }}">コメントなし</a>」
                                    @endif
                                    @if ($review->spoiler_alert == 1)
                                        <span class="spoiler_alert">ネタバレ有</span>
                                    @endif
                                </p>
                                <p class="p-0 m-0">更新日：{{ date('Y年m月d日H時i分', strtotime($review->updated_at)) }} / {{ $review->likes()->count() }}いいね</p>
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
                                    @if(isset($review->user()->first()->image))
                                        <img src="{{ secure_asset($review->user()->first()->image) }}" alt="{{ $review->user()->first()->penname}}さんアイコン画像" title="{ $review->user()->first()->penname }さん">
                                    @else
                                        <img src="{{ secure_asset('/images/person.jpeg') }}" alt="一般ユーザー画像" title="一般ユーザー">
                                    @endif
                                </p>
                            </div>
                            <div class="col-8 p-0 m-0">
                                <p class="p-0 m-0"><a href="{{ route('others_home', ['userID' => $review->user()->first()->id]) }}">{{ $review->user()->first()->penname }}</a></p>
                                <p class="p-0 m-0">
                                    {{ floor(Carbon\Carbon::parse($review->user()->first()->birth)->age / 10) * 10 }}代
                                    @if($review->user()->first()->gender == 'male')
                                        ・男性
                                    @elseif($review->user()->first()->gender == 'female')
                                        ・女性
                                    @endif
                                </p>
                                <p class="p-0 m-0">レビュー投稿数：
                                    {{ $review->user()->first()->reviews()->wherenotnull('total_evaluation')->count() }}
                                </p>
                                <p class="p-0 m-0">(総合評価平均：{{ sprintf('%.1f', $review->user()->first()->reviews()->avg('total_evaluation')) }}点)</p>
                                <p class="p-0 m-0">
                                    いいね取得総数
                                    {{ $iike_total = App\Like::whereHas('review', function($q) use($review){
                                        $q->where('user_id', '=',  $review->user()->first()->id);
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
