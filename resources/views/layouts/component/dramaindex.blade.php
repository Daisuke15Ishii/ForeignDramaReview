                <div class="row" style="border:dotted 1px">
                    <div class="col-md-3">
                        <div class="">
                            <a href="{{ url('/drama/dramaID') }}"><img src="#" width="190" height="260" alt="作品画像" title="作品タイトル"></a>
                        </div>
                        <small>&copy; 2008-2013 Sony Pictures Television Inc.</small>
                    </div>
                    <div class="col-md-9 bg-warning">
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <h2><a href="{{ url('/drama/dramaID') }}">ブレイキング・バッド　シーズン1</a></h2>
                            </div>
                            <div class="col-md-8">
                                <h3 style="display:inline">総合評価：</h3>
                                <span class="bg-secondary">99.99点<img src="#" alt="★評価"></span>
                            </div>
                            <div class="col-md-4">
                                <form id="" action=""{{ url('/drama/dramaID') }}"" method="POST">
                                    @csrf
                                    <input type="submit" value="マイページに作品登録">
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                総合評価の中央値：<span class="bg-secondary">99.99点</span>(レビュー評価数：1000人)
                            </div>
                            <div class="col-md-4">
                                <p>総合評価ランキング：<span class="bg-secondary">1000位</span></p>
                            </div>
                        </div>
                        <p><span class="">放送開始：2008年1月</span>    <span class="">話数：全7話</span>   <span class="">ジャンル：犯罪</span></p>
                        <div class="row">
                            <div class="col-md-9">
                                <p>作品概要：</p>
                                <blockquote cite="https://ja.wikipedia.org/wiki/%E3%83%96%E3%83%AC%E3%82%A4%E3%82%AD%E3%83%B3%E3%82%B0%E3%83%BB%E3%83%90%E3%83%83%E3%83%89">
                                <p>舞台は2008年のニューメキシコ州アルバカーキ。偉大な成功を遂げるはずだった天才化学者ウォルター・ホワイトは、人生に敗れ、50歳になる現在、心ならずも高校の化学教師の職に就いている[1]。妊娠中の妻、脳性麻痺の息子、多額の住宅ローンを抱え、洗車場のアルバイトを掛け持ちしていても、なお家計にはゆとりがない。ある日、ステージIIIAの肺癌で余命2～3年と診断され、自身の医療費と家族の経済的安定を確保するために多額の金が必要になる。義弟ハンクや旧友エリオットが費用の援助を買って出るが、あくまで自力で稼ぎたいウォルターはそれらを拒み、代わりにメタンフェタミン（通称メス）の製造・販売に望みをかける。麻薬取引については何も知らず、元教え子の売人ジェシー・ピンクマンを相棒にして、家族に秘密でビジネスを開始。裏社会での名乗りは ｢ハイゼンベルク｣。</p>
                                </blockquote>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ url('/drama/dramaID') }}"><button>作品情報を見る</button></a>
                            </div>
                        </div>
                    </div>
                </div>
