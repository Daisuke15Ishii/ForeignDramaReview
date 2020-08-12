{{-- mypage.drama.indexにて利用--}}
{{-- mypage.indexにて利用--}}

<div class="col-md-6 mb-2 px-2 mx-auto">
    <div class="row">
        <div class="col-11 mx-auto dramaindex-frame pb-1 px-0 mb-2">
            
            <form action="{{ route('my_favorite_set') }}" method="POST" class="bg-orange">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="drama_id" value="{{ $review->drama()->first()->id }}">
                <input type="hidden" name="review_id" value="{{ $review->id }}">
                @if($review->favorite()->first()->favorite !== 1)
                    <input type="hidden" name="favorite" value="1">
                    <label class="mb-0">
                        <input type="image" name="submit" class="icon-favorite" src="{{ asset('/images/star_grey.png') }}" alt="お気に入り登録">
                        通常
                    </label>
                @else
                    <input type="hidden" name="favorite" value="0">
                    <label class="mb-0">
                        <input type="image" name="submit" class="icon-favorite" src="{{ asset('/images/star_yellow.png') }}" alt="お気に入り解除">
                        お気に入り
                    </label>
                @endif
            </form>
            
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
                    </p>
                    <p class="p-0 m-0">
                        @include('layouts.component.createbutton', ['delete' => 'on' , 'small' => 'on', 'drama' => $review->drama()->first()])
                    </p>
                    <p class="p-0 m-0">更新日：{{ date('Y年m月d日H時i分', strtotime($review->updated_at)) }} / {{ $review->likes()->count() }}いいね</p>
                </div>
            </div>
        </div>
    </div>
</div>
