                    <div class="row small my-3">
                        {{-- 作品レビュー側(左側) --}}
                        <div class="col-md-6 mx-auto">
                            <div class="row">
                                <div class="col-md-11 mx-auto bg-warning border p-0 m-0">
                                    <div class="row p-0 m-0">
                                        <div class="col-md-2 border-right p-0 m-0">
                                            <p>
                                                作品レビュー
                                            </p>
                                        </div>
                                        <div class="col-md-2 p-0 m-0">
                                            <p class="mypageDrama">
                                                <a href="{{ route('dramaID_index', ['drama_id' => $review->drama()->first()->id]) }}"><img src="{{ secure_asset($review->drama()->first()->image_path) }}" alt="{{ $review->drama()->first()->title }}画像"></a>
                                            </p>
                                        </div>
                                        <div class="col-md-8 p-0 m-0">
                                            <p class="p-0 m-0"><a href="{{ route('dramaID_index', ['drama_id' => $review->drama()->first()->id]) }}">{{ $review->drama()->first()->title }} シーズン{{ $review->drama()->first()->season }}</a></p>
                                            <p class="p-0 m-0">総合評価：{{ $review->total_evaluation }}点<img src="#" alt="評価の星マーク"></p>
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
                                <div class="col-md-11 mx-auto bg-warning border p-0 m-0">
                                    <div class="row p-0 m-0">
                                        <div class="col-md-2 border-right p-0 m-0">
                                            <p>
                                                投稿者
                                            </p>
                                        </div>
                                        <div class="col-md-2 p-0 m-0">
                                            @if(isset($review->user()->first()->image))
                                                <p class=""><img src="{{ secure_asset($review->user()->first()->image) }}" class="person" alt="{{ $review->user()->first()->penname}}さんアイコン画像" title="{ $review->user()->first()->penname }さん"></p>
                                            @else
                                                <p class=""><img src="{{ secure_asset('/images/person.jpeg') }}" class="person" alt="一般ユーザー画像" title="一般ユーザー"></p>
                                            @endif
                                        </div>
                                        <div class="col-md-8 p-0 m-0">
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
                                                (総合評価平均：{{ sprintf('%.1f',$review->user()->first()->reviews()->avg('total_evaluation')) }}点)
                                            </p>
                                            <p class="p-0 m-0">
                                                いいね取得総数
                                                {{ $iike = App\Like::whereHas('review', function($q) use($review){
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
