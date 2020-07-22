                            <div class="col-md-11 mx-auto bg-light" style="border:dotted 1px">
                                <div class="row">
                                    <div class="col-md-2">
                                        {{-- 仮でユーザー画像登録--}}
                                        <img src="{{ secure_asset('/images/person.jpeg') }}" alt="user画像" class="person">
                                    </div>
                                    <div class="col-md-10">
                                        <p><a href="#">{{ $review->user()->first()->name }}</a>さん(仮で本名表示)</p>
                                        <p>20代・男性</p>
                                        <p>投稿日：{{ date('Y年m月d日H時i分', strtotime($review->updated_at))  }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        {{-- レビュータイトル・本文が投稿されている場合のみタイトル等を表示--}}
                                        @if(isset($review->review_title))
                                            {{-- countメソッドでレビューに対するいいね数を取得 --}}
                                            <h4>{{ \Str::limit($review->review_title, 100) }}</h4><span class="">({{ $review->likes()->count() }}いいね！)</span>
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
                                                    @else
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
                                                {{-- action内容は保留。取り合えずreturn viewが記述済のdramaID/indexに渡す,アクションでreview_id値を渡す --}}
                                                <form action="{{ route('review_like', ['drama_id' => $drama->id]) }}" method="POST" name="like">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="review_id" value="{{ $review->id }}">
                                                    <p>
                                                        {{-- 既にいいね済かの判定 --}}
                                                        @if (empty($review->likes()->get()->where('user_id',Auth::user()->id)->first()))
                                                            このレビュー→
                                                            <input type="submit" value="いいね！" name="like" alt="いいね送信" class="like">
                                                        @else
                                                            このレビュー→
                                                            <input type="submit" value="いいね取消" name="like" alt="いいね取消" class="like">
                                                        @endif
                                                    </p>
                                                </form>
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
