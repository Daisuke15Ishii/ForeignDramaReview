                            <div class="col-md-11 mx-auto bg-light" style="border:dotted 1px">
                                <div class="row">
                                    <div class="col-md-2">
                                        @if(isset($review->user()->first()->image_path))
                                            <p class=""><img src="{{ secure_asset($review->user()->first()->image_path) }}" class="person" alt="{{ $review->user()->first()->penname}}さんアイコン画像" title="{ $review->user()->first()->penname }さん"></p>
                                        @else
                                            <p class=""><img src="{{ secure_asset('/images/person.jpeg') }}" class="person" alt="一般ユーザー画像" title="一般ユーザー"></p>
                                        @endif
                                    </div>
                                    <div class="col-md-7">
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
                                    <div class="col-md-3">
                                        {{-- follow機能。後程、URLを再設定予定なので、恐らく$drama_idを渡す必要なし--}}
                                        @auth
                                            @if ( $review->user_id !== Auth::id() )
                                                <form action="{{ route('review_follow', ['drama_id' => $review->drama_id]) }}" method="POST" name="follow">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                                    <input type="hidden" name="following_user_id" value="{{ $review->user_id }}">
                                                    <p>
                                                        {{-- 既にフォロー済かの判定。レビューの人がauth::user()にフォローされているか調べる --}}
                                                        @if (empty($review->user()->first()->followedUser()->where('user_id',Auth::id())->first()))
                                                            <input type="submit" value="フォロー" name="follow" alt="フォロー" class="follow">
                                                        @else
                                                            <input type="submit" value="フォロー解除" name="follow" alt="フォロー解除" class="follow">
                                                        @endif
                                                    </p>
                                                </form>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        {{-- レビュータイトル・本文が投稿されている場合のみタイトル等を表示--}}
                                        @if(isset($review->review_title))
                                            {{-- countメソッドでレビューに対するいいね数を取得 --}}
                                            <h4><a href="{{ route('reviewID_index', ['drama_id' => $review->drama_id, 'review_id' => $review->id]) }}">「{{ \Str::limit($review->review_title, 100) }}」</a></h4>
                                            @if ($review->spoiler_alert == 1)
                                                <span class="spoiler_alert">ネタバレ有</span>
                                            @endif
                                            <span class="">({{ $review->likes()->count() }}いいね！)</span>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-10">
                                                <span class="bg-secondary">総合評価{{ $review->total_evaluation }}点<img src="#" alt="★評価"></span>
                                                シナリオ:{{ sprintf('%.1f', $review->story_evaluation) }}
                                                世界観:{{ sprintf('%.1f', $review->world_evaluation) }}
                                                演者:{{ sprintf('%.1f', $review->cast_evaluation) }}
                                                キャラ:{{ sprintf('%.1f', $review->char_evaluation) }}
                                                映像美:{{ sprintf('%.1f', $review->visual_evaluation) }}
                                                音楽:{{ sprintf('%.1f', $review->music_evaluation) }}
                                            </div>
                                            <div class="col-md-2">
                                                <p>状態：
                                                    @switch($review->progress)
                                                        @case(0)
                                                            未分類
                                                            @break
                                                        @case(1)
                                                            未視聴
                                                            @break
                                                        @case(2)
                                                            視聴断念
                                                            @break
                                                        @case(3)
                                                            視聴中
                                                            @break
                                                        @case(4)
                                                            視聴済
                                                            @break
                                                    @endswitch
                                                </p>
                                                <p>言語：
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
                                            <div class="row">
                                                <div class="col-md-12 mx-auto bg-white" style="border:solid 1px">
                                                    {{ \Str::limit($review->review_comment, 1000) }}
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
                                                                このレビュー→
                                                                <input type="submit" value="いいね！" name="like" alt="いいね送信" class="like">
                                                            @else
                                                                このレビュー→
                                                                <input type="submit" value="いいね取消" name="like" alt="いいね取消" class="like">
                                                            @endif
                                                        </p>
                                                    </form>
                                                @endif
                                            @endauth
                                            {{-- 違反報告は実装保留 --}}
                                            <form id="" name="" action="{{ url('/drama/dramaID/index') }}" method="POST">
                                                @csrf
                                                <input type="submit" value="違反を報告">
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
