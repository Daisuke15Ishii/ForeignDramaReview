                    {{-- 投稿者 --}}
                    <div class="col-md-6 mx-auto">
                        <div class="row">
                            <div class="col-md-11 mx-auto bg-warning border p-0 m-0">
                                <div class="row p-0 m-0">
                                    <div class="col-md-2 p-0 m-0">
                                        @if(isset($follower->followed()->first()->image_path))
                                            <p class="person"><img src="{{ secure_asset($follower->followed()->first()->image_path) }}" alt="{{ $follower->followed()->first()->penname}}さんアイコン画像" title="{ $follower->followed()->first()->penname }さん"></p>
                                        @else
                                            <p class="person"><img src="{{ secure_asset('/images/person.jpeg') }}" alt="一般ユーザー画像" title="一般ユーザー"></p>
                                        @endif
                                    </div>
                                    <div class="col-md-7 p-0 m-0">
                                        <p class="p-0 m-0"><a href="{{ route('others_home', ['userID' => $follower->followed()->first()->id]) }}">{{ $follower->followed()->first()->penname }}</a></p>
                                        <p class="p-0 m-0">
                                            {{ floor(Carbon\Carbon::parse($follower->followed()->first()->birth)->age / 10) * 10 }}代
                                            @if($follower->followed()->first()->gender == 'male')
                                                ・男性
                                            @elseif($follower->followed()->first()->gender == 'female')
                                                ・女性
                                            @endif
                                        </p>
                                        <p class="p-0 m-0">レビュー投稿数：
                                            {{ $follower->followed()->first()->reviews()->wherenotnull('total_evaluation')->count() }}
                                        </p>
                                        <p class="p-0 m-0">(総合評価平均：{{ sprintf('%.1f', $follower->followed()->first()->reviews()->avg('total_evaluation')) }}点)</p>
                                        <p class="p-0 m-0">
                                            いいね取得総数
                                            {{ $iike_total = App\Like::whereHas('review', function($q) use($follower){
                                                $q->where('user_id', '=',  $follower->followed()->first()->id);
                                                })->count()
                                            }}
                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        {{-- follow機能 --}}
                                        @auth
                                            @if ( $follower->user_id !== Auth::id() )
                                                <form action="{{ route('others_follow', ['userID' => $follower->user_id]) }}" method="POST" name="follow">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                                    <input type="hidden" name="following_user_id" value="{{ $follower->user_id }}">
                                                    <p>
                                                        @if (empty($follower->followed()->first()->followedUser()->where('user_id',Auth::id())->first()))
                                                            <input type="submit" value="フォロー" name="follow" alt="フォロー" class="follow">
                                                        @else
                                                            <input type="submit" value="フォロー解除" name="follow" alt="フォロー解除" class="follow">
                                                        @endif
                                                    </p>
                                                </form>
                                            @endif
                                        @endauth
                                    </div>
                                    <div class="col-md-12 p-0 m-0">
                                        <p class="p-0 m-0">プロフィール：
                                            @if(!empty($follower->followed()->first()->profile))
                                                {{ \Str::limit($follower->followed()->first()->profile, 200) }}
                                            @else
                                                <p>よろしくお願いします。(プロフィール未設定)</p>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
