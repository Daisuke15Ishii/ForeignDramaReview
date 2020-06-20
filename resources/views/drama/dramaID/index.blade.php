@extends('layouts.front')

{{-- データベース作成後にタイトル修正予定 --}}
@section('title', '$drama->title . シーズン . $drama->season｜洋ドラ会議(仮)')

{{-- データベース作成後に諸々修正予定(とりあえず文章を手入力) --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto bg-white">
                <h1>ブレイキング・バッド　シーズン１の作品情報</h1>
                <div class="row">
                    <div class="col-md-3">
                        <div class="">
                            <img src="#" width="190" height="260" alt="作品画像" title="作品タイトル">
                        </div>
                        <small>&copy; 2008-2013 Sony Pictures Television Inc.</small>
                        <p>タイトル：<cite>ブレイキング・バッド(Breaking Bad)</cite></p>
                        <p>出演者：ライアン・クランストン、アーロン・ポール</p>
                        <p>監督等：ヴィンス・ギリガン</p>
                        <p>国：アメリカ</p>
                        <p>放映日：2008年1月～</p>
                        <p>話数：7話</p>
                        <p>ジャンル：犯罪</p>
                    </div>
                    <div class="col-md-9 bg-warning">
                        <div class="row">
                            <h2>総合評価：</h2>
                            <span class="bg-secondary">99.99点<img src="#" alt="★評価"></span>
                            <form id="" action=""{{ url('/drama/dramaID/index') }}"" method="POST">
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
                <hr>
                <div class="row bg-warning">
                    <h3>作品概要</h3>
                    <div class="col-md-12">
                        <blockquote cite="https://ja.wikipedia.org/wiki/%E3%83%96%E3%83%AC%E3%82%A4%E3%82%AD%E3%83%B3%E3%82%B0%E3%83%BB%E3%83%90%E3%83%83%E3%83%89">
                        <p>舞台は2008年のニューメキシコ州アルバカーキ。偉大な成功を遂げるはずだった天才化学者ウォルター・ホワイトは、人生に敗れ、50歳になる現在、心ならずも高校の化学教師の職に就いている[1]。妊娠中の妻、脳性麻痺の息子、多額の住宅ローンを抱え、洗車場のアルバイトを掛け持ちしていても、なお家計にはゆとりがない。ある日、ステージIIIAの肺癌で余命2～3年と診断され、自身の医療費と家族の経済的安定を確保するために多額の金が必要になる。義弟ハンクや旧友エリオットが費用の援助を買って出るが、あくまで自力で稼ぎたいウォルターはそれらを拒み、代わりにメタンフェタミン（通称メス）の製造・販売に望みをかける。麻薬取引については何も知らず、元教え子の売人ジェシー・ピンクマンを相棒にして、家族に秘密でビジネスを開始。裏社会での名乗りは ｢ハイゼンベルク｣。</p>
                        引用元：<cite><a href="https://ja.wikipedia.org/wiki/%E3%83%96%E3%83%AC%E3%82%A4%E3%82%AD%E3%83%B3%E3%82%B0%E3%83%BB%E3%83%90%E3%83%83%E3%83%89">ブレイキング・バッド</a></cite>
                        </blockquote>
                    </div>
                </div>
                <hr>
                <div class="row bg-warning">
                    <div class="col-md-12">
                        <div class="row">
                            <h3>ブレイキング・バッドのレビュー</h3>
                            <select name="data[User][userReviewSearchKindId]" class="" id="UserUserReviewSearchKindId">
                                <option value="created_desc" selected="selected">投稿日が新しい順</option>
                                <option value="created_asc">投稿日時が古い順</option>
                                <option value="point_asc">評価が高い順</option>
                                <option value="point_desc">評価が低い順</option>
                                <option value="like_asc">いいねが多い順</option>
                                <option value="like_desc">いいねが少ない順</option>
                            </select>
                        </div>
                        <div class="row">
                            {{-- @foreachでサイト各レビューを引っ張ってくる予定 --}}
                            <div class="col-md-11 mx-auto">
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <img src="" alt="user画像">
                                        <p><a href="#">ペンネーム</a>さん</p>
                                        <p>20代・男性</p>
                                        <p>投稿日：2020/6/16</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <h4>レビュータイトル</h4><span class="">(8いいね！)</span>
                                        <div class="row">
                                            <div class="col-md-10">
                                                総合評価
                                            </div>
                                            <div class="col-md-2">
                                                <p>状態：視聴済</p>
                                                <p>言語：吹替</p>
                                            </div>
                                        </div>
                                        <div class="row bg-white" style="border:solid 1px">
                                            hogehogehogehogehogehogehoge
                                        </div>
                                        {{-- formではない気がするけど取り合えず仮置き --}}
                                        これレビューいいね！<form id="" name="" action=""{{ url('/drama/dramaID/index') }}"" method="POST">@csrf<input type="submit" value="❤"></form>
                                        <form id="" name="" action=""{{ url('/drama/dramaID/index') }}"" method="POST">@csrf<input type="submit" value="違反を報告"></form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-11 mx-auto">
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <img src="" alt="user画像">
                                        <p><a href="#">ペンネーム</a>さん</p>
                                        <p>20代・男性</p>
                                        <p>投稿日：2020/6/16</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <h4>レビュータイトル</h4><span class="">(8いいね！)</span>
                                        <div class="row">
                                            <div class="col-md-10">
                                                総合評価
                                            </div>
                                            <div class="col-md-2">
                                                <p>状態：視聴済</p>
                                                <p>言語：吹替</p>
                                            </div>
                                        </div>
                                        <div class="row bg-white" style="border:solid 1px">
                                            hogehogehogehogehogehogehoge
                                        </div>
                                        {{-- formではない気がするけど取り合えず仮置き --}}
                                        これレビューいいね！<form id="" name="" action=""{{ url('/drama/dramaID/index') }}"" method="POST">@csrf<input type="submit" value="❤"></form>
                                        <form id="" name="" action=""{{ url('/drama/dramaID/index') }}"" method="POST">@csrf<input type="submit" value="違反を報告"></form>
                                    </div>
                                </div>
                            </div>
                            
                            ここにペジネーション配置
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
