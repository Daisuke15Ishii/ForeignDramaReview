{{-- user.mypage.drama.favorite.indexにて利用--}}
{{-- user.mypage.indexにて利用--}}
{{-- user.userID.drama.favorite.indexにて利用--}}
{{-- user.userID.indexにて利用--}}

<div class="row mb-2 mx-0">
    <div class="col-12 mx-auto px-0 mb-2">
        <div class="row mx-3">
            <div class="col-lg-1 p-0 m-0">
                <p class="large total-evaluation">
                    @if($top == "yes")
                        第{{ $loop->iteration }}位
                    @else
                        第{{ $i = $loop->iteration + (($reviews->currentPage() - 1) * $reviews->perPage()) }}位
                    @endif
                </p>
            </div>
            <div class="col-11 mx-auto dramaindex-frame px-0 mb-2">
                <div class="row m-0 p-0">
                    <div class="col-6 col-md-3 order-md-2 p-0 m-0">
                        <p class="middle-drama">
                            <a href="{{ route('dramaID_index', ['drama_id' => $review->drama()->first()->id]) }}">
                                <img src="{{ secure_asset($review->drama()->first()->image_path) }}" alt="{{ $review->drama()->first()->title }}画像">
                            </a>
                        </p>
                    </div>
                    <div class="col-6 col-md-2 order-md-1 small">
                        <form action="{{ route('my_favorite_set') }}" method="POST" class="mx-auto">
                            @csrf
                            @if($review->favorite()->first()->favorite == false)
                                @if($user == 'mypage')
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="drama_id" value="{{ $review->drama()->first()->id }}">
                                    <input type="hidden" name="review_id" value="{{ $review->id }}">
                                    <input type="hidden" name="favorite" value="1">
                                    <input type="image" name="submit" class="icon-large-favorite" src="{{ asset('/images/icon/star_grey.png') }}" alt="お気に入り登録">
                                    <p class="mb-0">
                                        お気に入り登録
                                    </p>
                                @else
                                    <img class="icon-large-favorite" src="{{ asset('/images/icon/star_grey.png') }}" alt="非お気に入り">
                                    <p class="mb-0">通常</p>
                                @endif
                            @else
                                @if($user == 'mypage')
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="drama_id" value="{{ $review->drama()->first()->id }}">
                                    <input type="hidden" name="review_id" value="{{ $review->id }}">
                                    <input type="hidden" name="favorite" value="0">
                                    <input type="image" name="submit" class="icon-large-favorite" src="{{ asset('/images/icon/star_yellow.png') }}" alt="お気に入り解除">
                                    <p class="mb-0">
                                        お気に入り解除
                                    </p>
                                @else
                                    <img class="icon-large-favorite" src="{{ asset('/images/icon/star_yellow.png') }}" alt="お気に入り">
                                    <p class="mb-0">
                                        お気に入り
                                    </p>
                                @endif
                            @endif
                        </form>
                    </div>
                    <div class="col-12 col-md-7 order-md-3 p-0 m-0">
                        <p class="p-0 m-0"><a href="{{ route('dramaID_index', ['drama_id' => $review->drama()->first()->id]) }}">{{ $review->drama()->first()->title }} シーズン{{ $review->drama()->first()->season }}</a></p>
                        <p class="p-0 m-0">総合評価：{{ $review->total_evaluation }}点
                            @include('layouts.component.totalevaluation', ['total_evaluation' =>  $review->total_evaluation, 'size' => '1.2rem'])</span>
                        </p>
                        <div class="row p-0 m-0 small">
                            <div class="col-4 p-0 m-0">
                                <p class="p-0 m-0">
                                    シナリオ：{{ sprintf('%.1f',$review->story_evaluation) }}点
                                </p>
                            </div>
                            <div class="col-4 p-0 m-0">
                                <p class="p-0 m-0">
                                    世界観：{{ sprintf('%.1f',$review->world_evaluation) }}点
                                </p>
                            </div>
                            <div class="col-4 p-0 m-0">
                                <p class="p-0 m-0">
                                    演者：{{ sprintf('%.1f',$review->cast_evaluation) }}点
                                </p>
                            </div>
                            <div class="col-4 p-0 m-0">
                                <p class="p-0 m-0">
                                    キャラ：{{ sprintf('%.1f',$review->char_evaluation) }}点
                                </p>
                            </div>
                            <div class="col-4 p-0 m-0">
                                <p class="p-0 m-0">
                                    映像美：{{ sprintf('%.1f',$review->visual_evaluation) }}点
                                </p>
                            </div>
                            <div class="col-4 p-0 m-0">
                                <p class="p-0 m-0">
                                    音楽：{{ sprintf('%.1f',$review->music_evaluation) }}点
                                </p>
                            </div>
                        </div>
                        
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
                            
                            @if($user !== 'mypage')
                                <span class="p-0 m-0">
                                    {{-- いいね済の有無を表示させる --}}
                                    @auth
                                        {{-- 既にいいね済かの判定　→　authのレビューではない、かつ、likesテーブルにレコードがある場合 --}}
                                        @if ( $review->user_id !== Auth::id() && !empty($review->likes()->where('user_id',Auth::id())->first()))
                                            (いいね済)
                                        @endif
                                    @endauth
                                </span>
                            @endif
                        </p>
                        @if($user == 'mypage')
                            <p class="p-0 m-0">
                                @include('layouts.component.createbutton', ['delete' => 'on' , 'small' => 'on', 'drama' => $review->drama()->first()])
                            </p>
                        @endif
                        <p class="p-0 m-0">更新日：{{ date('Y年m月d日H時i分', strtotime($review->updated_at)) }} / {{ $review->likes()->count() }}いいね</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
