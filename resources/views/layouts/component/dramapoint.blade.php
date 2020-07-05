                <div class="row">
                    <div class="col-md-3">
                        <div class="">
                            <p class="eyecatch" width="190" height="260"><img src="{{ secure_asset('images/1.png') }}" alt="{{ $items->title }}画像" title="{{ $items->title }}"></p>
                        </div>
                        <small>&copy; 2008-2013 {{ $items->copyright }}</small>
                        <p>タイトル：<cite>{{ $items->title }}({{ $items->title_en }})</cite></p>
                        <p>出演者：{{ $items->cast1 }}、{{ $items->cast2 }}、{{ $items->cast3 }}</p>
                        <p>監督等：{{ $items->staff }}</p>
                        <p>国：{{ $items->country }}</p>
                        <p>放映日：{{ $items->onair }}年月～</p>
                        <p>話数：{{ $items->number }}話</p>
                        <p>ジャンル：犯罪</p>
                    </div>
                    <div class="col-md-9 bg-warning">
                        <div class="row">
                            <h2>総合評価：</h2>
                            <span class="bg-secondary">99.99点<img src="#" alt="★評価"></span>
                            <form id="" action=""{{ url('/drama/dramaID') }}"" method="POST">
                                @csrf
                                <input type="submit" value="マイページに作品登録">
                            </form>
                        </div>
                        <div class="row">
                        総合評価の中央値：<span class="bg-secondary">99.99点</span>(レビュー評価数：1000人)
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>シナリオの評価：<span class="bg-secondary"><img src="#" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>演者の評価：<span class="bg-secondary"><img src="#" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>映像美の評価：<span class="bg-secondary"><img src="#" alt="★評価"></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>世界観の評価：<span class="bg-secondary"><img src="#" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>キャラの評価：<span class="bg-secondary"><img src="#" alt="★評価"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p>音楽の評価：<span class="bg-secondary"><img src="#" alt="★評価"></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>作品登録者数：<span class="bg-secondary">1000人</span></p>
                            </div>
                            <div class="col-md-4">
                                <p>お気に入り登録者数：<span class="bg-secondary">1000人</span></p>
                            </div>
                            <div class="col-md-4">
                                <p>総合評価ランキング：<span class="bg-secondary">1000位</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <h3>作品成分分類</h3>
                            <ul>
                                <li>必須：<span class="bg-secondary">33.3%</span></li>
                                <li>必須：<span class="bg-secondary">33.3%</span></li>
                                <li>必須：<span class="bg-secondary">33.3%</span></li>
                            </ul>
                        </div>
                        <a href="#"><button>レビューを書く！</button></a>
                    </div>
                </div>
