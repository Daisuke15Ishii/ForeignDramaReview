                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-11 mx-auto bg-warning border p-0 m-0">
                                <div class="row p-0 m-0">
                                    <div class="col-md-2 small border-right p-0 m-0">
                                        @if($review->favorite()->first()->favorite !== 1)
                                            <p class="submit">
                                                <img id="favorite" src="{{ asset('/images/star_grey.png') }}" alt="非お気に入り">
                                            </p>
                                        @else
                                            <p class="submit">
                                                <img id="favorite" src="{{ asset('/images/star_yellow.png') }}" alt="お気に入り">
                                            </p>
                                            <p>
                                                お気に入り
                                            </p>
                                        @endif
                                    </div>
                                    <div class="col-md-2 p-0 m-0">
                                        <p class='mypageDrama'>
                                            <a href="{{ route('dramaID_index', ['drama_id' => $review->drama()->first()->id]) }}"><img src="{{ secure_asset($review->drama()->first()->image_path) }}" alt="{{ $review->drama()->first()->title }}画像"></a>
                                        </p>
                                    </div>
                                    <div class="col-md-8 p-0 m-0">
                                        <p class="p-0 m-0"><a href="{{ route('dramaID_index', ['drama_id' => $review->drama()->first()->id]) }}">{{ $review->drama()->first()->title }} シーズン{{ $review->drama()->first()->season }}</a></p>
                                        <p class="p-0 m-0">総合評価：{{ $review->total_evaluation }}点<img src="#" alt="評価の星マーク"></p>
                                        <div class="row p-0 m-0 small">
                                            <div class="col-md-4 p-0 m-0">
                                                <p class="p-0 m-0">
                                                    シナリオ：{{ $review->story_evaluation }}点
                                                </p>
                                            </div>
                                            <div class="col-md-4 p-0 m-0">
                                                <p class="p-0 m-0">
                                                    世界観：{{ $review->world_evaluation }}点
                                                </p>
                                            </div>
                                            <div class="col-md-4 p-0 m-0">
                                                <p class="p-0 m-0">
                                                    演者：{{ $review->cast_evaluation }}点
                                                </p>
                                            </div>
                                            <div class="col-md-4 p-0 m-0">
                                                <p class="p-0 m-0">
                                                    キャラ：{{ $review->char_evaluation }}点
                                                </p>
                                            </div>
                                            <div class="col-md-4 p-0 m-0">
                                                <p class="p-0 m-0">
                                                    映像美：{{ $review->visual_evaluation }}点
                                                </p>
                                            </div>
                                            <div class="col-md-4 p-0 m-0">
                                                <p class="p-0 m-0">
                                                    音楽：{{ $review->music_evaluation }}点
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
                                            <span class="p-0 m-0">
                                                {{-- いいね済の有無を表示させる --}}
                                                @auth
                                                    {{-- 既にいいね済かの判定　→　authのレビューではない、かつ、likesテーブルにレコードがある場合 --}}
                                                    @if ( $review->user_id !== Auth::id() && !empty($review->likes()->where('user_id',Auth::id())->first()))
                                                        (いいね済)
                                                    @endif
                                                @endauth
                                            </span>
                                        </p>
                                        <p class="p-0 m-0 small">更新日：{{ date('Y年m月d日', strtotime($review->updated_at)) }} / {{ $review->likes()->count() }}いいね</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
