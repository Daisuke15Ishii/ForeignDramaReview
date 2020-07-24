                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-11 mx-auto bg-warning border p-0 m-0">
                                <div class="row">
                                    <div class="col-md-2 border-right p-0 m-0">
                                        {{-- 後で考える。灰色の星のボタンを押すとお気に入り登録される。既に登録されている場合は星の画像が光ってる --}}
                                        <label for="">
                                            <img src="#" alt="星">
                                        </label>
                                        <p>お気に入り</p>
                                    </div>
                                    <div class="col-md-2 p-0 m-0">
                                        <p class='mypageDrama'>
                                            <a href="{{ route('dramaID_index', ['drama_id' => $review->drama()->first()->id]) }}"><img src="{{ secure_asset($review->drama()->first()->image_path) }}" alt="{{ $review->drama()->first()->title }}画像"></a>
                                        </p>
                                    </div>
                                    <div class="col-md-8 p-0 m-0">
                                        <p class="p-0 m-0"><a href="{{ route('dramaID_index', ['drama_id' => $review->drama()->first()->id]) }}">{{ $review->drama()->first()->title }} シーズン{{ $review->drama()->first()->season }}</a></p>
                                        <p class="p-0 m-0">総合評価：{{ $review->total_evaluation }}点<img src="#" alt="評価の星マーク"></p>
                                        {{-- if文により、既に投稿済みなら編集ボタン、未投稿ならば新規投稿ボタンを表示 --}}
                                        <p class="p-0 m-0">
                                            {{-- レビュータイトル・本文が投稿されている場合のみタイトル等を表示--}}
                                            @if(isset($review->review_title))
                                                「<a href="{{ url('/drama/dramaID/review/reviewID') }}">{{ \Str::limit($review->review_title, 50) }}</a>」
                                            @else
                                                「<a href="{{ url('/drama/dramaID/review/reviewID') }}">コメントなし</a>」
                                            @endif
                                        </p>
                                        <p class="p-0 m-0">
                                            <button>
                                                <a href="{{ route('review_edit', ['drama_id' => $review->drama()->first()->id, 'review_id' => $review->id]) }}">レビュー編集</a>
                                            </button>
                                            {{-- 削除ボタンはどこに置くか検討中 --}}
                                            <button>
                                                <a href="{{ route('review_edit', ['drama_id' => $review->drama()->first()->id, 'review_id' => $review->id]) }}">レビュー削除？(js検討)</a>
                                            </button>
                                        </p>
                                        <p class="p-0 m-0">更新日：{{ date('Y年m月d日', strtotime($review->updated_at)) }} / {{ $review->likes()->count() }}いいね</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
