{{-- layouts/front.blade.phpを読み込む --}}
@extends('layouts.front')

@section('title', 'マニュアル|サイト概要')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="">
                    <h1>マニュアル</h1>
                </div>
                <div class="row">
                    <div class="col-md-12 mx-auto bg-white">
                        <h2>作品検索</h2>
                        <p>検索方法は次の2種類がございます。</p>
                            <h3>簡易検索(画面上部)</h3>
                            <p>「作品名で検索」と「レビューコメントから検索」をお選びいただけます。作品名検索の場合、日本語もしくはアルファベットでご入力ください。検索方法は前方一致検索となります。</p>
                            <dl>
                                <dt>例：ブレイキング・バッド(breaking bad)</dt>
                                <dd>○「ブレイキング・バッド」「ぶれいきんぐ・ばっど」「breaking bad」「ブレイキング」「break」など</dd>
                                <dd>×「ブレイキングバッド」「ぶれいきんぐばっど」「breakingbad」「BREAKINGBAD」</dd>
                            </dl>
                            
                            <h3>詳細条件検索</h3>
                            <p>より詳細な条件を指定して検索ができます。お好みの条件でご検索ください。</p>
                            <p>作品名検索については簡易検索と同様の前方一致検索です。</p>
                            <p>検索条件を複数指定した場合、and検索になります。但し、ジャンルもしくは前作視聴(準備中)の同項目内において複数チェックした場合、or検索となります。</p>
                            <dl>
                                <dt>例：「総合得点50点以上、シナリオ3.0以上、ジャンル犯罪・家族」で検索した場合</dt>
                                <dd>「総合得点50点以上」and「シナリオ3.0以上」and「ジャンル(犯罪or家族)」の検索結果が表示されます。</dd>
                            </dl>
                            
                        <h2>レビュー閲覧</h2>
                        <p>各作品ページの下部にて、各ユーザーが投稿したレビューを閲覧できます。必要に応じて並び替え・絞り込みをご利用ください。</p>
                        <dl>
                            <dt>視聴済のみ</dt>
                            <dd>「現在の進捗」が視聴済のレビューのみ表示します。</dd>

                            <dt>コメント有のみ</dt>
                            <dd>レビューコメント有のみ表示(点数評価のみを除外)します。</dd>

                            <dt>ネタバレ表示</dt>
                            <dd>伏字になっているネタバレ有のレビューコメントを表示します。</dd>

                            <dt>フォロー中のみ</dt>
                            <dd>フォロー中のユーザーのレビューのみ表示します。アカウント登録者のみ利用できます。</dd>
                        </dl>
                        <p>また、参考になったレビュー等にはいいねができます。いいねしたレビュー一覧はマイページにてご覧いただけます。</p>
                        <p>また、気になったユーザーをフォローすることができます。フォローしたユーザーー一覧はマイページにてご覧いただけます。なお、いいね機能・フォロー機能はアカウント登録者のみ利用できます。</p>

                        <h2>レビュー投稿・マイページ登録およびレビュー削除</h2>
                        <p>アカウント登録を行うとレビュー投稿およびマイページ登録ができます。レビュー投稿は、次の4段階に分けて投稿・管理することができます。</p>

                            <h3>マイページ登録</h3>
                            <p>作品概要ページ等からマイページ登録が行えます。マイページ登録は、レビュー投稿せずに作品をマイページに追加できます。追加された作品は「現在の進捗：未分類」で登録されます。気になる作品をとりあえずメモしておきたい場合などにご利用ください。</p>

                            <h3>現在の進捗のみ保存</h3>
                            <p>レビュー作成・編集画面にて、現在の進捗欄のみ変更して保存することができます。まだ見終わっていないけど作品登録したい場合などにご利用ください。</p>

                            <h3>点数評価のみ投稿</h3>
                            <p>現在の進捗＋点数評価のみで投稿ができます。レビューコメントするのは面倒だけど点数だけ保存したい場合などにご利用ください。なお、総合点数のみの投稿はできませんのでご了承ください(他の項目すべてをご入力ください)。</p>

                            <h3>レビューコメント投稿</h3>
                            <p>レビューコメントを投稿できます。なお、コメントを入力する際、タイトルおよび点数評価等は必須入力項目となりますので、合わせてご入力ください。また、レビューコメントにネタバレを含む場合は、必ず「ネタバレ有」にチェックしてください。「ネタバレ有」にチェックいただくと、レビュー閲覧画面にてネタバレコメントが伏字になります。</p>

                            <h3>レビュー削除(マイページから除外)</h3>
                            <p>レビューコメントの削除はマイページからのみ行えます。また、レビュー削除ができる作品は、現在の進捗が「未分類」または「観たい」の作品に限ります。なお、レビュー削除を行うと自動的にマイページからも除外されます。レビュー削除をせずにマイページから除外することができません。</p>

                        <h2>マイページ</h2>
                        <p>アカウント登録するとマイページがご利用できます。</p>
                        <p>マイページでは、各作品管理、お気に入り登録・解除、プロフィール設定、その他機能がご利用できます。</p>
                        
                            <h3>登録作品</h3>
                            <p>レビュー投稿時の「現在の進捗」毎に作品を管理できます。また、お気に入り登録すると「現在の進捗」とは別に、作品群を管理することができます。</p>
                            <p>お気に入り登録はレビュー投稿画面からも可能ですが、マイページの作品一覧画面からもお気に入り登録・解除が可能です。作品一覧画面にて、各作品左側の星マークをクリックするとお気に入り登録(解除)されます。</p>

                            <h3>レビュー削除(マイページから除外)</h3>
                            <p>レビューコメントの削除はマイページからのみ行えます。また、レビュー削除ができる作品は、現在の進捗が「未分類」または「観たい」の作品に限ります。なお、レビュー削除を行うと自動的にマイページからも除外されます。レビュー削除せずにマイページから除外することはできません。</p>

                            <h3>フォロー・フォロワー一覧</h3>
                            <p>あなたがフォローしたユーザー、またはフォローされたユーザー一覧を確認できます。フォローしたユーザーがレビュー投稿した場合などは、マイページに通知が届きます(準備中)。</p>

                            <h3>通知機能(準備中)</h3>
                            <p>次の場合、マイページ上に各種通知が届きます。</p>
                                <ul>
                                    <li>投稿したレビューがいいねされたとき</li>
                                    <li>フォローしたユーザーがレビュー投稿したとき</li>
                                    <li>フォローされたとき</li>
                                    <li>その他</li>
                                </ul>

                        <h2>おすすめドラマ</h2>
                        <p>各種ランキングを掲載しております。</p>
                            <ul>
                                <li>総合評価順位</li>
                            </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
