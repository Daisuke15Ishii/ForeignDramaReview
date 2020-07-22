                <div class="row">
                    <div class="col-md-3">
                        <div class="">
                            <p class="eyecatch overflow-hidden col-md-12"><img src="{{ secure_asset($drama->image_path) }}" alt="{{ $drama->title }}画像" title="{{ $drama->title }}"></p>
                        </div>
                        <small>&copy; {{ $drama->copyright }}</small>
                        <p>タイトル：<cite>{{ $drama->title }}({{ $drama->title_en }})</cite></p>
                        <p>出演者：{{ $drama->cast1 }}、{{ $drama->cast2 }}、{{ $drama->cast3 }}</p>
                        <p>監督等：{{ $drama->staff }}</p>
                        <p>国：{{ $drama->country }}</p>
                            <?php $date = $drama->onair; ?>
                        @if($date)
                            <p>{{ date('放映日：Y年m月～', strtotime($date)) }}</p>
                        @else
                            <p>放映日： 年 月～</p>
                        @endif
                        <p>話数：全{{ $drama->number }}話</p>
                        <p>ジャンル：
                            @foreach($drama->janre()->get() as $janre)
                                {{ $janre->janre }}
                            @endforeach
                        </p>
                    </div>
                    <div class="col-md-9 bg-warning">
                        <div class="row">
                            <h2>総合評価：</h2>
                            {{-- sprintf('%.2f', 変数)は、変数を小数点2桁まで表示する --}}
                            @if($drama->reviews()->count('total_evaluation') !== 0)
                                <span class="bg-secondary">{{ sprintf('%.2f', $drama->reviews()->avg('total_evaluation')) }}点<img src="#" alt="★評価"></span>
                            @else
                                <span class="bg-secondary">--点<img src="#" alt="★評価"></span>
                            @endif
                            <form id="" action=""{{ url('/drama/dramaID') }}"" method="POST">
                                @csrf
                                <input type="submit" value="マイページに作品登録">
                            </form>
                            
                            {{-- 確認テスト用の表示 --}}
                            @auth
                                @if(empty($drama->favorites()->where('user_id',Auth::user()->id)->first()))
                                    お気に入り登録の有無：レビューなし(会員)
                                @else
                                    お気に入り登録の有無：{{ $drama->favorites()->where('user_id',Auth::user()->id)->first()->favorite }}
                                @endif
                            @else
                                お気に入り登録の有無：なし(ゲスト)
                            @endauth
                        </div>
                        <div class="row">
                            @if($drama->reviews()->count('total_evaluation') !== 0)
                                総合評価の中央値：<span class="bg-secondary">{{ $drama->reviews()->get()->median('total_evaluation') }}点</span>(レビュー評価数：{{ $drama->reviews()->count() }}人)
                            @else
                                総合評価の中央値：<span class="bg-secondary">--点</span>(レビュー評価数：0人)
                            @endif
                        </div>
                        <div class="row">
                            {{-- 下記の各項目評価の表示は、点数によって星の個数で表現。数字で仮表示 --}}
                            <div class="col-md-4">
                                <p>シナリオの評価：<span class="bg-secondary">{{ sprintf('%.2f', $drama->reviews()->avg('story_evaluation')) }}<img class="star" src="{{ secure_asset('/images/star_yellow.png') }}" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>演者の評価：<span class="bg-secondary">{{ sprintf('%.2f', $drama->reviews()->avg('cast_evaluation')) }}<img src="#" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>映像美の評価：<span class="bg-secondary">{{ sprintf('%.2f', $drama->reviews()->avg('visual_evaluation')) }}<img src="#" alt="★評価"></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>世界観の評価：<span class="bg-secondary">{{ sprintf('%.2f', $drama->reviews()->avg('world_evaluation')) }}<img src="#" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>キャラの評価：<span class="bg-secondary">{{ sprintf('%.2f', $drama->reviews()->avg('char_evaluation')) }}<img src="#" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>音楽の評価：<span class="bg-secondary">{{ sprintf('%.2f', $drama->reviews()->avg('music_evaluation')) }}<img src="#" alt="★評価"></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>作品登録者数：<span class="bg-secondary">{{ $drama->favorites()->count() }}人</span></p>
                            </div>
                            <div class="col-md-4">
                                <p>お気に入り登録者数：<span class="bg-secondary">{{ $drama->favorites()->where('favorite',1)->count() }}人</span></p>
                            </div>
                            <div class="col-md-4">
                                {{-- ランキング表示はメソッドだけでは難しいかもしれない --}}
                                <p>総合評価ランキング：<span class="bg-secondary">{{ $drama->score()->first()->rank_average_total_evaluation }}位</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>作品成分分類</h3>
                                <ul>
                                    @if($previous_require = $drama->reviews()->where('previous',2)->count() !== 0)
                                        <li>必須：<span class="bg-secondary">{{ sprintf('%.1f', $previous_require = $drama->reviews()->where('previous',2)->count() * 100 / $drama->reviews()->whereIn('previous',[0,1,2])->count()) }}%</span></li>
                                    @else
                                        <li>必須：<span class="bg-secondary">0%</span></li>
                                    @endif
                                    @if($previous_require = $drama->reviews()->where('previous',1)->count() !== 0)
                                        <li>観た方が良い：<span class="bg-secondary">{{ sprintf('%.1f', $previous_better = $drama->reviews()->where('previous',1)->count() * 100 / $drama->reviews()->whereIn('previous',[0,1,2])->count()) }}%</span></li>
                                    @else
                                        <li>観た方が良い：<span class="bg-secondary">0%</span></li>
                                    @endif
                                    @if($previous_require = $drama->reviews()->where('previous',0)->count() !== 0)
                                        <li>不要：<span class="bg-secondary">{{ sprintf('%.1f', $previous_no = $drama->reviews()->where('previous',0)->count() * 100 / $drama->reviews()->whereIn('previous',[0,1,2])->count()) }}%</span></li>
                                    @else
                                        <li>不要：<span class="bg-secondary">0%</span></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        @guest
                            <a href="{{ route('login') }}"><button>レビューを書く！</button></a>
                        @else
                            {{-- レビューを既に投稿したか判定 --}}
                            @if(empty($drama->reviews()->where('user_id',Auth::user()->id)->first()))
                                <a href="{{ route('review_add', ['drama_id' => $drama->id]) }}"><button>レビューを書く！</button></a>
                            @else
                                {{-- edit画面に飛ばす予定 --}}
                                <a href="{{ route('review_edit', ['drama_id' => $drama->id, 'review_id' => $drama->reviews()->where('user_id',Auth::user()->id)->first()->id]) }}"><button>レビューを編集する！</button></a>
                            @endif
                        @endguest
                    </div>
                </div>
