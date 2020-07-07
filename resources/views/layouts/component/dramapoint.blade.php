                <div class="row">
                    <div class="col-md-3">
                        <div class="">
                            <p class="eyecatch overflow-hidden col-md-12"><img src="{{ secure_asset($items->image_path) }}" alt="{{ $items->title }}画像" title="{{ $items->title }}"></p>
                        </div>
                        <small>&copy; 2008-2013 {{ $items->copyright }}</small>
                        <p>タイトル：<cite>{{ $items->title }}({{ $items->title_en }})</cite></p>
                        <p>出演者：{{ $items->cast1 }}、{{ $items->cast2 }}、{{ $items->cast3 }}</p>
                        <p>監督等：{{ $items->staff }}</p>
                        <p>国：{{ $items->country }}</p>
                            <?php $date = $items->onair; ?>
                        @if($date)
                            <p>{{ date('放映日：Y年m月～', strtotime($date)) }}</p>
                        @else
                            <p>放映日： 年 月～</p>
                        @endif
                        <p>話数：{{ $items->number }}話</p>
                        <p>ジャンル：犯罪</p>
                    </div>
                    <div class="col-md-9 bg-warning">
                        <div class="row">
                            <h2>総合評価：</h2>
                            {{-- sprintf('%.2f', 変数)は、変数を小数点2桁まで表示する --}}
                            <span class="bg-secondary">{{ sprintf('%.2f', $items->score()->first()->average_total_evaluation) }}点<img src="#" alt="★評価"></span>
                            <form id="" action=""{{ url('/drama/dramaID') }}"" method="POST">
                                @csrf
                                <input type="submit" value="マイページに作品登録">
                            </form>
                        </div>
                        <div class="row">
                        総合評価の中央値：<span class="bg-secondary">{{ sprintf('%.2f', $items->score()->first()->median_total_evaluation) }}点</span>(レビュー評価数：{{ $items->score()->first()->reviews }}人)
                        </div>
                        <div class="row">
                            {{-- 下記の各項目評価の表示は、点数によって星の個数で表現。数字で仮表示 --}}
                            <div class="col-md-4">
                                <p>シナリオの評価：<span class="bg-secondary">{{ $items->score()->first()->average_story_evaluation }}<img src="#" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>演者の評価：<span class="bg-secondary">{{ $items->score()->first()->average_cast_evaluation }}<img src="#" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>映像美の評価：<span class="bg-secondary">{{ $items->score()->first()->average_visual_evaluation }}<img src="#" alt="★評価"></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>世界観の評価：<span class="bg-secondary">{{ $items->score()->first()->average_world_evaluation }}<img src="#" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>キャラの評価：<span class="bg-secondary">{{ $items->score()->first()->average_char_evaluation }}<img src="#" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>音楽の評価：<span class="bg-secondary">{{ $items->score()->first()->average_music_evaluation }}<img src="#" alt="★評価"></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>作品登録者数：<span class="bg-secondary">{{ $items->score()->first()->registers }}人</span></p>
                            </div>
                            <div class="col-md-4">
                                <p>お気に入り登録者数：<span class="bg-secondary">{{ $items->score()->first()->favorites }}人</span></p>
                            </div>
                            <div class="col-md-4">
                                <p>総合評価ランキング：<span class="bg-secondary">{{ $items->score()->first()->rank_average_total_evaluation }}位</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>作品成分分類</h3>
                                今は「人」だが、「％」に変更予定
                                <ul>
                                    <li>必須：<span class="bg-secondary">{{ $items->score()->first()->previous_require }}人</span></li>
                                    <li>観た方が良い：<span class="bg-secondary">{{ $items->score()->first()->previous_better }}人</span></li>
                                    <li>不要：<span class="bg-secondary">{{ $items->score()->first()->previous_no }}人</span></li>
                                </ul>
                            </div>
                        </div>
                        <a href="{{ url('/drama/dramaID/review') }}"><button>レビューを書く！</button></a>
                    </div>
                </div>
