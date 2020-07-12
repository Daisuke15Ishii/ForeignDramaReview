                <div class="row">
                    <div class="col-md-3">
                        <div class="">
                            <p class="eyecatch overflow-hidden col-md-12"><img src="{{ secure_asset($drama->image_path) }}" alt="{{ $drama->title }}画像" title="{{ $drama->title }}"></p>
                        </div>
                        <small>&copy; 2008-2013 {{ $drama->copyright }}</small>
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
                        <p>話数：{{ $drama->number }}話</p>
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
                            <span class="bg-secondary">{{ sprintf('%.2f', $drama->score()->first()->average_total_evaluation) }}点<img src="#" alt="★評価"></span>
                            <form id="" action=""{{ url('/drama/dramaID') }}"" method="POST">
                                @csrf
                                <input type="submit" value="マイページに作品登録">
                            </form>
                            
                            {{-- 確認テスト用の表示 --}}
                            @guest
                                お気に入り登録の有無：なし(ゲスト)
                            @else
                                お気に入り登録の有無：{{ $drama->favorites()->where('user_id',Auth::user()->id)->first()->favorite }}
                            @endguest
                        </div>
                        <div class="row">
                        総合評価の中央値：<span class="bg-secondary">{{ sprintf('%.2f', $drama->score()->first()->median_total_evaluation) }}点</span>(レビュー評価数：{{ $drama->score()->first()->reviews }}人)
                        </div>
                        <div class="row">
                            {{-- 下記の各項目評価の表示は、点数によって星の個数で表現。数字で仮表示 --}}
                            <div class="col-md-4">
                                <p>シナリオの評価：<span class="bg-secondary">{{ $drama->score()->first()->average_story_evaluation }}<img class="star" src="{{ secure_asset('/images/star_yellow.png') }}" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>演者の評価：<span class="bg-secondary">{{ $drama->score()->first()->average_cast_evaluation }}<img src="#" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>映像美の評価：<span class="bg-secondary">{{ $drama->score()->first()->average_visual_evaluation }}<img src="#" alt="★評価"></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>世界観の評価：<span class="bg-secondary">{{ $drama->score()->first()->average_world_evaluation }}<img src="#" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>キャラの評価：<span class="bg-secondary">{{ $drama->score()->first()->average_char_evaluation }}<img src="#" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>音楽の評価：<span class="bg-secondary">{{ $drama->score()->first()->average_music_evaluation }}<img src="#" alt="★評価"></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>作品登録者数：<span class="bg-secondary">{{ $drama->score()->first()->registers }}人</span></p>
                            </div>
                            <div class="col-md-4">
                                <p>お気に入り登録者数：<span class="bg-secondary">{{ $drama->score()->first()->favorites }}人</span></p>
                            </div>
                            <div class="col-md-4">
                                <p>総合評価ランキング：<span class="bg-secondary">{{ $drama->score()->first()->rank_average_total_evaluation }}位</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>作品成分分類</h3>
                                今は「人」だが、「％」に変更予定
                                <ul>
                                    <li>必須：<span class="bg-secondary">{{ $drama->score()->first()->previous_require }}人</span></li>
                                    <li>観た方が良い：<span class="bg-secondary">{{ $drama->score()->first()->previous_better }}人</span></li>
                                    <li>不要：<span class="bg-secondary">{{ $drama->score()->first()->previous_no }}人</span></li>
                                </ul>
                            </div>
                        </div>
                        <a href="{{ url('/drama/dramaID/review') }}"><button>レビューを書く！</button></a>
                    </div>
                </div>
