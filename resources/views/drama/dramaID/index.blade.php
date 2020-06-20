@extends('layouts.front')

{{-- データベース作成後にタイトル修正予定 --}}
@section('title', '$drama->title . シーズン . $drama->season｜洋ドラ会議(仮)')

{{-- データベース作成後に諸々修正予定(とりあえず文章を手入力) --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto bg-white">
                <h1>ブレイキング・バッド　シーズン１の作品情報</h1>
                @include('layouts.component.dramapoint')
                
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
                            @include('layouts.component.review')
                            @include('layouts.component.review')
                            @include('layouts.component.review')
                            ここにペジネーション配置
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
