{{-- others.drama.indexにて利用--}}
{{-- others.indexにて利用--}}

<div class="col-md-6 mb-2 px-2 mx-auto">
    <div class="row">
        <div class="col-11 mx-auto dramaindex-frame pb-1 px-0 mb-2">
            
            <div class="bg-orange">
                @if($review->favorite()->first()->favorite !== 1)
                    <label class="mb-0">
                        <img class="icon-favorite" src="{{ asset('/images/icon/star_grey.png') }}" alt="通常">
                        通常
                    </label>
                @else
                    <label class="mb-0">
                        <img class="icon-favorite" src="{{ asset('/images/icon/star_yellow.png') }}" alt="お気に入り">
                        お気に入り
                    </label>
                @endif
            </div>
            
            <div class="row p-0 mx-0">
                <div class="col-3 p-0 m-0">
                    <p class="small-drama">
                        <a href="{{ route('dramaID_index', ['drama_id' => $review->drama()->first()->id]) }}">
                            <img src="{{ secure_asset($review->drama()->first()->image_path) }}" alt="{{ $review->drama()->first()->title }}画像">
                        </a>
                    </p>
                </div>
                <div class="col-9 px-1 m-0">
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
                        <span class="p-0 m-0">
                            {{-- いいね済の有無を表示させる --}}
                            @auth
                                {{-- 既にいいね済かの判定　→　authのレビューではない、かつ、likesテーブルにレコードがある場合 --}}
                                @if ( $review->user_id !== Auth::id() && !empty($review->likes()->where('user_id',Auth::id())->first()))
                                    (いいね済
                                    <img src="{{ asset('/images/icon/heart_red.png') }}" alt="いいね" class="icon-like">
                                    )
                                @endif
                            @endauth
                        </span>
                    </p>
                    <p class="p-0 m-0">更新日：{{ date('Y年m月d日H時i分', strtotime($review->updated_at)) }} / {{ $review->likes()->count() }}いいね</p>
                </div>
            </div>
        </div>
    </div>
</div>



