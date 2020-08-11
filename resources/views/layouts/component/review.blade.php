{{-- drama.dramaID.indexにて利用 --}}

<div class="col-12 mx-auto mb-4 p-0" style="border:dotted 1px">
    <div class="row">
        <div class="col-12">
            <div class="review-profile">
                @if(isset($review->user()->first()->image))
                    <img src="{{ secure_asset($review->user()->first()->image) }}" alt="{{ $review->user()->first()->penname}}さんアイコン画像" title="{ $review->user()->first()->penname }さん">
                @else
                    <img src="{{ secure_asset('/images/person.jpeg') }}" alt="一般ユーザー画像" title="一般ユーザー">
                @endif
            </div>
            <div class="float-left">
                <p><a href="{{ route('others_home', ['userID' => $review->user()->first()->id]) }}">{{ $review->user()->first()->penname }}</a></p>
                <p>
                    {{ floor(Carbon\Carbon::parse($review->user()->first()->birth)->age / 10) * 10 }}代
                    @if($review->user()->first()->gender == 'male')
                        ・男性
                    @elseif($review->user()->first()->gender == 'female')
                        ・女性
                    @endif
                </p>
                <p>投稿日：{{ date('Y年m月d日H時i分', strtotime($review->updated_at))  }}</p>
            </div>
            @auth
                @if ( $review->user_id !== Auth::id() )
                    <form action="{{ route('review_follow', ['drama_id' => $review->drama_id]) }}" method="POST" name="follow" class="float-left">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="following_user_id" value="{{ $review->user_id }}">
                        {{-- 既にフォロー済かの判定。レビューの人がauth::user()にフォローされているか調べる --}}
                        @if (empty($review->user()->first()->followedUser()->where('user_id',Auth::id())->first()))
                            <input type="hidden" value="フォロー" name="follow">
                            <button type="submit" class="btn-register btn-accent-color m-0">
                                フォローする
                            </button>
                        @else
                            <input type="hidden" value="フォロー解除" name="follow">
                            <button type="submit" class="btn-register btn-delete-color m-0">
                                フォロー解除
                            </button>
                        @endif
                    </form>
                @endif
            @endauth
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 mx-auto">
            {{-- レビュータイトル・本文が投稿されている場合のみタイトル等を表示--}}
            @if(isset($review->review_title))
                <h3 class="review-title-h3"><a href="{{ route('reviewID_index', ['drama_id' => $review->drama_id, 'review_id' => $review->id]) }}">「{{ \Str::limit($review->review_title, 100) }}」</a></h3>
                <p class="review-title-h3">
                    @if ($review->spoiler_alert == 1)
                        <span class="spoiler_alert">ネタバレ有</span>
                    @endif
                    {{-- countメソッドでレビューに対するいいね数を表示 --}}
                    (<span class="font-weight-bold">{{ $review->likes()->count() }}</span>いいね！)
                </p>
            @endif
            <div class="row">
                <div class="col-lg-10 col-7">
                    <p class="font-weight-bold pl-3">
                        総合評価：
                        {{-- sprintf('%.2f', 変数)は、変数を小数点2桁まで表示する --}}
                        <span class="total-evaluation bg-evaluation">{{ sprintf('%.2f', $review->total_evaluation) }}点
                        @include('layouts.component.totalevaluation', ['total_evaluation' =>  $review->total_evaluation, 'size' => '1rem'])</span>
                    </p>
                    <p class="review-evaluation-display pl-3 mb-2">
                        <span>シナリオ:{{ sprintf('%.1f', $review->story_evaluation) }}</span>
                        <span>世界観:{{ sprintf('%.1f', $review->world_evaluation) }}</span>
                        <span>演者:{{ sprintf('%.1f', $review->cast_evaluation) }}</span>
                        <span>キャラ:{{ sprintf('%.1f', $review->char_evaluation) }}</span>
                        <span>映像美:{{ sprintf('%.1f', $review->visual_evaluation) }}</span>
                        <span>音楽:{{ sprintf('%.1f', $review->music_evaluation) }}</span>
                    </p>
                </div>
                <div class="col-lg-2 col-5 parent">
                    <p class="child">状態：
                        @switch($review->progress)
                            @case(0)
                                未分類
                                @break
                            @case(1)
                                観たい
                                @break
                            @case(2)
                                リタイア
                                @break
                            @case(3)
                                視聴中
                                @break
                            @case(4)
                                視聴済
                                @break
                        @endswitch
                        <br>
                        言語：
                        @if($review->subtitles == 0)
                            吹替
                        @elseif($review->subtitles == 1)
                            字幕
                        @endif
                    </p>
                </div>
            </div>
            
            {{-- レビュータイトル・本文が投稿されている場合のみタイトル等を表示--}}
            @if(isset($review->review_comment))
                <div class="row mx-0 mb-2">
                    <div class="col-md-12 mx-auto review-comment-display">
                        @if($review->spoiler_alert == 0 || in_array('spoiler_display' ,$sorts))
                            <p>{{ \Str::limit($review->review_comment, 1000) }}</p>
                        @elseif ($review->spoiler_alert == 1)
                            <p class="spoiler"><a href="{{ route('reviewID_index', ['drama_id' => $review->drama_id, 'review_id' => $review->id]) }}">ネタバレ有のレビューを読む</a></p>
                        @endif
                    </div>
                </div>
                @auth
                    @if ( $review->user_id !== Auth::id() )
                        <form action="{{ route('review_like', ['drama_id' => $review->drama_id]) }}" method="POST" name="like">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="review_id" value="{{ $review->id }}">
                            <p>
                                {{-- 既にいいね済かの判定 --}}
                                @if (empty($review->likes()->where('user_id',Auth::id())->first()))
                                    このレビューが役に立った
                                    <input type="hidden" value="いいね！" name="like">
                                    <input type="image" src="{{ asset('/images/icon/heart_gray.png') }}" value="いいね！" alt="いいね" class="icon-like">
                                @else
                                    このレビューが役に立った
                                    <input type="hidden" value="いいね取消" name="like">
                                    <input type="image" src="{{ asset('/images/icon/heart_red.png') }}" value="いいね取消" alt="いいね取消" class="icon-like">
                                @endif
                            </p>
                        </form>
                    @endif
                @endauth
                {{-- 違反報告ボタンは実装保留。準備中 --}}
            @endif
        </div>
    </div>
</div>
