<?php

use Illuminate\Database\Seeder;

class DramasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //dramaレコードを作成すると同時に、scoreテーブルに空のレコードを挿入する
        //dramaレコードを作成すると同時に、janresテーブルと紐づけ(中間テーブルのdrama_janreテーブルにレコード作成)

        //画像ファイルの保存場所
        $img = '/images/';
        
        //janresテーブルに登録されている総数(登録idの最後)
        $total_jan = 27;

        //ブレイキング・バッド(5シーズン)
        for($i=1; $i < 6; $i++){
            $drama = new \App\Drama([
                'title' => 'ブレイキング・バッド',
                'season' => $i,
                'title_en' => 'Breaking Bad',
                'cast1' => 'ブライアン・クランストン',
                'cast2' => 'アーロン・ポール',
                'cast3' => 'ボブ・オデンカーク',
                'staff' => 'ヴィンス・ギリガン',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '',
                'introduction' => '舞台は2008年のニューメキシコ州アルバカーキ。偉大な成功を遂げるはずだった天才化学者ウォルター・ホワイトは、人生に敗れ、50歳になる現在、心ならずも高校の化学教師の職に就いている[1]。妊娠中の妻、脳性麻痺の息子、多額の住宅ローンを抱え、洗車場のアルバイトを掛け持ちしていても、なお家計にはゆとりがない。ある日、ステージIIIAの肺癌で余命2～3年と診断され、自身の医療費と家族の経済的安定を確保するために多額の金が必要になる。義弟ハンクや旧友エリオットが費用の援助を買って出るが、あくまで自力で稼ぎたいウォルターはそれらを拒み、代わりにメタンフェタミン（通称メス）の製造・販売に望みをかける。麻薬取引については何も知らず、元教え子の売人ジェシー・ピンクマンを相棒にして、家族に秘密でビジネスを開始。裏社会での名乗りは ｢ハイゼンベルク｣。',
                'image_path' => $img . 'breaking_bad_s' . $i . '.jpg',
                'copyright' => '2019 Home Box Office, Inc. All rights reserved.',
                'url' => 'https://ja.wikipedia.org/wiki/ブレイキング・バッド'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2008/1/20';
                    $drama->number = '7';
                    break;
                case 2:
                    $drama->onair = '2009/3/1';
                    $drama->number = '13';
                    break;
                case 3:
                    $drama->onair = '2010/3/1';
                    $drama->number = '13';
                    break;
                case 4:
                    $drama->onair = '2011/7/1';
                    $drama->number = '13';
                    break;
                case 5:
                    $drama->onair = '2012/7/16';
                    $drama->number = '16';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();
            
            $jan = array(1,19,20,21,26);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }

        }

        //ホームランド(7シーズン)
        for($i=1; $i < 8; $i++){
            $drama = new \App\Drama([
                'title' => 'ホームランド',
                'season' => '1',
                'title_en' => 'HOMELAND',
                'cast1' => 'クレア・デインズ',
                'cast2' => 'ダミアン・ルイス',
                'cast3' => 'マンディ・パティンキン',
                'staff' => 'ハワード・ゴードン',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '12',
                'introduction' => 'アルカーイダとのアメリカ国内での戦いが描かれる。CIAの作戦担当官キャリー・マティソンは、イラクで内通者からアメリカ人戦争捕虜がアルカーイダによって転向させられたとの情報を得る。だが命令違反の作戦を実行したため保護観察下に置かれ、バージニア州ラングレーのCIAテロ対策センターへ異動となる。上司であり、過去に恋愛関係にあったテロ対策センター指揮官デビッド・エスティースが、緊急のブリーフィングのためにキャリーを呼び出し、8年間行方不明であったアメリカ海兵隊軍曹ニコラス・ブロディが、テロリストのアブ・ナジールのアジトから救出されたことを告げる。キャリーは、ブロディが転向した戦争捕虜であると信じるようになる',
                'image_path' => $img . 'HOMELAND_s' . $i . '.jpg',
                'copyright' => 'Twentieth Century Fox Home Entertainment LLC.',
                'url' => 'https://ja.wikipedia.org/wiki/HOMELAND_(テレビドラマ)'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2011/10/2';
                    break;
                case 2:
                    $drama->onair = '2012/9/30';
                    break;
                case 3:
                    $drama->onair = '2013/9/29';
                    break;
                case 4:
                    $drama->onair = '2014/10/5';
                    break;
                case 5:
                    $drama->onair = '2015/10/4';
                    break;
                case 6:
                    $drama->onair = '2017/1/15';
                    break;
                case 7:
                    $drama->onair = '2018/2/11';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(1,2,21);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //ゲーム・オブ・スローンズ(8シーズン)
        for($i=1; $i < 9; $i++){
            $drama = new \App\Drama([
                'title' => 'ゲーム・オブ・スローンズ',
                'season' => $i,
                'title_en' => 'Game of Thrones',
                'cast1' => 'キット・ハリントン',
                'cast2' => 'エミリア・クラーク',
                'cast3' => 'ピーター・ディンクレイジ',
                'staff' => 'デイヴィッド・ベニオフ',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '10',
                'introduction' => '『氷と炎の歌』の物語は、ウェスタロスと呼ばれる大陸と、エッソスと呼ばれる大陸を主とした架空世界を舞台としている。物語には3つの主要な筋があり、次第に絡み合うようになる。第一は諸名家によるウェスタロスの王座を巡る争い、第二はウェスタロスの国境となる巨大な氷の〈壁〉の北での〈異形〉と呼ばれる脅威の増大、第三は13年前の内戦で殺された王の娘であるデナーリス・ターガリエンのウェスタロスへの帰還と玉座を求める野望である。',
                'image_path' => $img . 'game_of_thrones_s' . $i . '.jpg',
                'copyright' => '2019 Home Box Office, Inc. All rights reserved.',
                'url' => 'https://ja.wikipedia.org/wiki/ゲーム・オブ・スローンズ'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2011/4/17';
                    break;
                case 2:
                    $drama->onair = '2012/4/1';
                    break;
                case 3:
                    $drama->onair = '2013/3/31';
                    break;
                case 4:
                    $drama->onair = '2014/4/6';
                    break;
                case 5:
                    $drama->onair = '2015/4/12';
                    break;
                case 6:
                    $drama->onair = '2016/4/24';
                    break;
                case 7:
                    $drama->onair = '2017/7/16';
                    $drama->number = '7';
                    break;
                case 8:
                    $drama->onair = '2019/4/14';
                    $drama->number = '6';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(12,13,18,23,24);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //名探偵モンク(8シーズン)
        for($i=1; $i < 9; $i++){
            $drama = new \App\Drama([
                'title' => '名探偵モンク',
                'season' => $i,
                'title_en' => 'MONK',
                'cast1' => 'トニー・シャルーブ',
                'cast2' => 'ビティ・シュラム',
                'cast3' => 'テッド・レビン',
                'staff' => 'アンディ・ブレックマン',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '16',
                'introduction' => 'サンフランシスコ市警察本部のエイドリアン・モンク刑事は、妻のトゥルーディーを自動車爆弾によって何者かに殺される。その犯人を検挙することができなかったモンクは、強迫性障害がひどくなり、刑事を休職し、自宅に三年間閉じこもる。その後、看護師であるシャローナ・フレミングをアシスタントとして採用し、市警察のコンサルタントとして犯罪、そして様々な恐怖症と戦いながら、復職とトゥルーディー事件の解決を目指す。',
                'image_path' => $img . 'MONK_s' . $i . '.jpg',
                'copyright' => '',
                'url' => 'https://ja.wikipedia.org/wiki/名探偵モンク'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2002/7/12';
                    $drama->number = '12';
                    $drama->copyright = '2000 USA Cable Entertainment, LLC. All Rights Reserved.';
                    break;
                case 2:
                    $drama->onair = '2003/6/20';
                    $drama->copyright = '2003 Universal Network Television LLC. All Rights Reserved.';
                    break;
                case 3:
                    $drama->onair = '2004/6/18';
                    $drama->copyright = '2004 Universal Network Television LLC. All Rights Reserved.';
                    break;
                case 4:
                    $drama->onair = '2005/7/8';
                    $drama->cast2 = 'トレイラー・ハワード';
                    $drama->copyright = '2005 Moratim Productions GmbH & Co. KG. All Rights Reserved.';
                    break;
                case 5:
                    $drama->onair = '2006/7/7';
                    $drama->cast2 = 'トレイラー・ハワード';
                    $drama->copyright = '2006 Universal Studios. All Rights Reserved.';
                    break;
                case 6:
                    $drama->onair = '2007/7/13';
                    $drama->cast2 = 'トレイラー・ハワード';
                    $drama->copyright = '2007 Universal Studios. All Rights Reserved.';
                    break;
                case 7:
                    $drama->onair = '2008/7/18';
                    $drama->cast2 = 'トレイラー・ハワード';
                    $drama->copyright = '2008 Universal Studios. All Rights Reserved.';
                    break;
                case 8:
                    $drama->onair = '2009/8/7';
                    $drama->cast2 = 'トレイラー・ハワード';
                    $drama->copyright = '2009 Universal Studios. All Rights Reserved.';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(1,3,4);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //トゥルー・ディテクティブ(3シーズン)
        for($i=1; $i < 4; $i++){
            $drama = new \App\Drama([
                'title' => 'トゥルー・ディテクティブ',
                'season' => $i,
                'title_en' => 'TRUE DETECTIVE',
                'cast1' => '',
                'cast2' => '',
                'cast3' => '',
                'staff' => 'ニック・ピゾラット',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '8',
                'introduction' => '',
                'image_path' => $img . 'TRUE_DETECTIVE_s' . $i . '.jpg',
                'copyright' => '',
                'url' => 'https://ja.wikipedia.org/wiki/TRUE_DETECTIVE'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2014/1/12';
                    $drama->cast1 = 'マシュー・マコノヒー';
                    $drama->cast2 = 'ウディ・ハレルソン';
                    $drama->cast3 = 'ミシェル・モナハン';
                    $drama->staff = 'キャリー・ジョージ・フクナガ';
                    $drama->introduction = 'それぞれに警察を離れていたルイジアナ州警察殺人課の元刑事、ラスト・コール（マシュー・マコノヒー）とマーティ・ハート（ウディ・ハレルソン）は2012年、ハリケーン・リタの被害によって書類が失われたとの理由で、過去の捜査に関する聞き取りに呼び出される。二人は1995年にドーラ・ラングという女性の猟奇殺人事件を解決して有名となった後、2002年に仲違いをしてからの10年間、互いに音信不通だったという。個別の聞き取りのなかで、ラストとマーティは過去の捜査や刑事としての生き方を振り返るが、経緯が明らかになるにつれ、ドーラ殺人事件はまだ解決していないのではないかという疑惑が浮かび上がっていく。';
                    $drama->copyright = '2015 Warner Bros.Entertainment Inc. All rights reserved.';
                    break;
                case 2:
                    $drama->onair = '2015/6/21';
                    $drama->cast1 = 'コリン・ファレル';
                    $drama->cast2 = 'ヴィンス・ヴォーン';
                    $drama->cast3 = 'レイチェル・マクアダムス';
                    $drama->introduction = 'カリフォルニア・ハイウェイパトロールの警官ポール・ウッドルー（テイラー・キッチュ）が道路脇でヴィンチ市幹部の死体を発見し、ヴィンチ署のレイ・ヴェルコロ刑事（コリン・ファレル）とヴェンチュラ郡保安官事務所のアンティゴネ刑事（レイチェル・マクアダムス）が加わって、州、郡、市の3つの警察組織による合同捜査が行われ、市を巡る巨大な腐敗と過去の因縁が浮かび上がる。そこにヴェルコロの旧知の犯罪者で実業家のフランク・セミョン（ヴィンス・ヴォーン）が絡む。';
                    $drama->copyright = '2016 Warner Bros.Entertainment Inc. All rights reserved.';
                    break;
                case 3:
                    $drama->onair = '2019/1/13';
                    $drama->cast1 = 'マハーシャラ・アリ';
                    $drama->cast2 = 'スティーヴン・ドーフ';
                    $drama->cast3 = 'カルメン・イジョゴ';
                    $drama->introduction = 'シーズン3は1980年、1990年、2015年の三つの時代で1980年に起きた子どもの失踪殺人事件を捜査するウェイン・ヘイズを主人公とする。1980年、人種差別の色濃く残るオザーク高原で、ヘイズ刑事は相棒のローランド・ウェスト刑事とともに男女二人の子供の失踪事件を追う。やがて一人の死体が発見され、容疑者をヘイズが射殺して事件は幕引きとなる。1990年、二人の子の教師でヘイズの妻となったアメリアは事件についての本を書く。行方不明であった女の子ジュリーの指紋が強盗現場で発見されて捜査が再開される。ジュリーの両親は殺される。ヘイズとウェストは、ジュリーの母を殺したと疑う元警官を尋問中に殺してしまい、死体を埋める。2015年、引退し記憶障害に苦しむヘイズは、事件を調べるTVディレクターの取材を受けて事件を再び調べ始める。';
                    $drama->copyright = '2018 Warner Bros. Japan LLC All rights reserved.';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(1,2,4,19,26);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //マインドハンター(2シーズン)
        for($i=1; $i < 3; $i++){
            $drama = new \App\Drama([
                'title' => 'マインドハンター',
                'season' => $i,
                'title_en' => 'MINDHUNTER',
                'cast1' => 'ジョナサン・グロフ',
                'cast2' => 'ホルト・マッキャラニー',
                'cast3' => 'アナ・トーヴ',
                'staff' => 'デヴィッド・フィンチャー',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '10',
                'introduction' => '1970年代後半、殺人犯の心理を研究して犯罪科学の幅を広げようとするFBI捜査官2人。研究を進めるうち、あまりにリアルな怪物に危ういほど近づいてゆく。',
                'image_path' => $img . 'MINDHUNTER_s' . $i . '.jpg',
                'copyright' => '',
                'url' => 'https://www.netflix.com/jp/title/80114855'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2017/10/13';
                    $drama->number = '10';
                    break;
                case 2:
                    $drama->onair = '2019/8/16';
                    $drama->number = '9';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(1,2,4,15,22);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //デクスター 警察官は殺人鬼(8シーズン)
        for($i=1; $i < 9; $i++){
            $drama = new \App\Drama([
                'title' => 'デクスター 警察官は殺人鬼',
                'season' => $i,
                'title_en' => 'Dexter',
                'cast1' => 'マイケル・C・ホール',
                'cast2' => 'ジェニファー・カーペンター',
                'cast3' => 'ジェームズ・レマー',
                'staff' => '',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '12',
                'introduction' => 'マイアミ警察の血痕鑑識官として働くデクスターにはもう一つの顔があった。それは自らの殺害欲求を抑えられないシリアルキラーとしての顔。しかし、彼が狙うのは彼独自の基準に適った凶悪な犯罪者のみ。彼は優秀な鑑識官として事件を解決する一方で法で裁き切れない凶悪犯を己の衝動に因って次々と殺害していく。',
                'image_path' => $img . 'Dexter_s' . $i . '.jpg',
                'copyright' => '2014 Showtime Networks Inc. All Rights Reserved.',
                'url' => 'https://ja.wikipedia.org/wiki/デクスター_警察官は殺人鬼'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2006/10/1';
                    break;
                case 2:
                    $drama->onair = '2007/9/30';
                    break;
                case 3:
                    $drama->onair = '2008/9/28';
                    break;
                case 4:
                    $drama->onair = '2009/9/27';
                    break;
                case 5:
                    $drama->onair = '2010/9/26';
                    break;
                case 6:
                    $drama->onair = '2011/10/2';
                    break;
                case 7:
                    $drama->onair = '2012/9/30';
                    break;
                case 8:
                    $drama->onair = '2013/6/30';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(1,2,4,21,26);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //ジ・アメリカンズ(6シーズン)
        for($i=1; $i < 7; $i++){
            $drama = new \App\Drama([
                'title' => 'ジ・アメリカンズ',
                'season' => $i,
                'title_en' => 'The Americans',
                'cast1' => 'ケリー・ラッセル',
                'cast2' => 'マシュー・リス',
                'cast3' => 'ホリー・テイラー',
                'staff' => 'ジョー・ワイズバーグ',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '13',
                'introduction' => '1980年のSDIを推進したレーガン大統領時代を舞台とし、ソ連がアメリカに潜伏させていた"モグラ"と呼ばれるスパイの夫婦を中心に描く。夫婦は国家によって結婚を命令され、身分を偽装してワシントンD.C.の郊外であるバージニア州北部に住み、二人の子供をもうける。だがその近所にFBI局員が引っ越してくる。',
                'image_path' => $img . 'The_Americans_s' . $i . '.jpg',
                'copyright' => '2020 Twentieth Century Fox Film Corporation. All rights reserved.',
                'url' => 'https://ja.wikipedia.org/wiki/ジ・アメリカンズ'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2013/1/30';
                    break;
                case 2:
                    $drama->onair = '2014/2/26';
                    break;
                case 3:
                    $drama->onair = '2015/1/28';
                    break;
                case 4:
                    $drama->onair = '2016/3/16';
                    break;
                case 5:
                    $drama->onair = '2017/3/7';
                    break;
                case 6:
                    $drama->onair = '2018/3/28';
                    $drama->number = '10';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(2,12,26);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //コールドケース 迷宮事件簿(7シーズン)
        for($i=1; $i < 8; $i++){
            $drama = new \App\Drama([
                'title' => 'コールドケース 迷宮事件簿',
                'season' => $i,
                'title_en' => 'Cold Case',
                'cast1' => 'キャスリン・モリス',
                'cast2' => 'ダニー・ピノ',
                'cast3' => 'ジョン・フィン',
                'staff' => 'ジェリー・ブラッカイマー',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '23',
                'introduction' => 'フィラデルフィアを舞台に、未解決の殺人事件（通称「コールドケース」）を女性刑事リリー・ラッシュを中心とする殺人課のメンバー（未解決事件専従捜査班）が解決していく。',
                'image_path' => $img . 'Cold_Case_s' . $i . '.jpg',
                'copyright' => '',
                'url' => 'https://ja.wikipedia.org/wiki/コールドケース_迷宮事件簿'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2003/9/28';
                    break;
                case 2:
                    $drama->onair = '2004/10/3';
                    break;
                case 3:
                    $drama->onair = '2005/9/25';
                    break;
                case 4:
                    $drama->onair = '2006/9/24';
                    $drama->number = '24';
                    break;
                case 5:
                    $drama->onair = '2007/9/23';
                    $drama->number = '18';
                    break;
                case 6:
                    $drama->onair = '2008/9/28';
                    break;
                case 7:
                    $drama->onair = '2009/9/27';
                    $drama->number = '22';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(1,2,4);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //プリズン・ブレイク(5シーズン)
        for($i=1; $i < 6; $i++){
            $drama = new \App\Drama([
                'title' => 'プリズン・ブレイク',
                'season' => $i,
                'title_en' => 'Prison Break',
                'cast1' => 'ウェントワース・ミラー',
                'cast2' => 'ドミニク・パーセル',
                'cast3' => 'サラ・ウェイン・キャリーズ',
                'staff' => 'ポール・シェアリング',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '',
                'introduction' => '副大統領の弟を射殺した容疑で逮捕され、死刑判決を受けたリンカーン・バローズ。主人公マイケル・スコフィールドは兄リンカーンの無実を信じ、刑執行から救い出すために綿密な計画を備え、自身の体に刑務所の設計図を模したタトゥーをいれる。銀行強盗を装い、目論見通り実刑が確定したマイケルは、リンカーンが収容され、また自身が改修工事の際に携わった重警備のフォックスリバー刑務所への収監を希望。兄弟での脱獄を企てる。',
                'image_path' => $img . 'Prison_Break_s' . $i . '.jpg',
                'copyright' => '2020 Twentieth Century Fox Film Corporation. All rights reserved.',
                'url' => 'https://ja.wikipedia.org/wiki/プリズン・ブレイク'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2005/8/29';
                    $drama->number = '22';
                    break;
                case 2:
                    $drama->onair = '2006/8/21';
                    $drama->number = '22';
                    break;
                case 3:
                    $drama->onair = '2007/9/17';
                    $drama->number = '13';
                    break;
                case 4:
                    $drama->onair = '2008/9/1';
                    $drama->number = '24';
                    break;
                case 5:
                    $drama->onair = '2017/4/4';
                    $drama->number = '9';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(1,21);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //ドクター・ハウス(8シーズン)
        for($i=1; $i < 9; $i++){
            $drama = new \App\Drama([
                'title' => 'ドクター・ハウス',
                'season' => $i,
                'title_en' => 'Dr.HOUSE',
                'cast1' => 'ヒュー・ローリー',
                'cast2' => 'ロバート・ショーン・レナード',
                'cast3' => 'リサ・エデルシュタイン',
                'staff' => 'ブライアン・シンガー',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '22',
                'introduction' => '診断医としての評価は高いが一匹狼で捻くれ者の主人公ハウスとその診断チームが、他の医師が解明出来なかった病の原因をそれぞれ専門分野の能力や個性を生かして突き止めていく姿を描く医療ドラマ。主人公で、同病院の解析医療部門のチーフであるグレゴリー・ハウス医師は業界でもよく知られる天才医師だが、人間性は最悪で、病因が特定できるのであれば何をしても良いと考える、良く言えば型破り、悪く言えば傍若無人な人物である。',
                'image_path' => $img . 'Dr_HOUSE_s' . $i . '.jpg',
                'copyright' => '2011/2012 Universal Studios. All Rights Reserved.',
                'url' => 'https://ja.wikipedia.org/wiki/Dr.HOUSE'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2004/11/16';
                    break;
                case 2:
                    $drama->onair = '2005/9/13';
                    $drama->number = '24';
                    break;
                case 3:
                    $drama->onair = '2006/9/5';
                    $drama->number = '24';
                    break;
                case 4:
                    $drama->onair = '2007/9/25';
                    $drama->number = '16';
                    break;
                case 5:
                    $drama->onair = '2008/9/16';
                    $drama->number = '24';
                    break;
                case 6:
                    $drama->onair = '2009/9/21';
                    break;
                case 7:
                    $drama->onair = '2010/9/20';
                    $drama->number = '23';
                    break;
                case 8:
                    $drama->onair = '2011/10/3';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(5,15);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //ベター・コール・ソウル(5シーズン)
        for($i=1; $i < 6; $i++){
            $drama = new \App\Drama([
                'title' => 'ベター・コール・ソウル',
                'season' => $i,
                'title_en' => 'Better Call Saul',
                'cast1' => 'ボブ・オデンカーク',
                'cast2' => 'ジョナサン・バンクス',
                'cast3' => 'レイ・シーホーン',
                'staff' => 'ヴィンス・ギリガン',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '10',
                'introduction' => '物語はソウルが『ブレイキングバッド』に登場する6年前の2002年から始まる[1]。ブレイキング・バッドの6年前、本名のジミー・マッギルで活動していた貧乏弁護士ソウル・グッドマンと、フィラデルフィアの警官を引退しアルバカーキに移ったマイク・エルマントラウトが主要な登場人物となる。ブレイキング・バッドに登場したトゥコやヘクターなどの人物が絡み、ジミーとマイクの背景が描かれる。',
                'image_path' => $img . 'Better_Call_Saul_s' . $i . '.jpg',
                'copyright' => '2015 Sony Pictures Television Inc. All Rights Reserved.',
                'url' => 'https://ja.wikipedia.org/wiki/ベター・コール・ソウル'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2015/2/8';
                    break;
                case 2:
                    $drama->onair = '2016/2/15';
                    break;
                case 3:
                    $drama->onair = '2017/4/10';
                    break;
                case 4:
                    $drama->onair = '2018/8/6';
                    break;
                case 5:
                    $drama->onair = '2020/2/23';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(1,11,19);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //24(9シーズン)
        for($i=1; $i < 10; $i++){
            $drama = new \App\Drama([
                'title' => '24',
                'season' => $i,
                'title_en' => 'TWENTY FOUR',
                'cast1' => 'キーファー・サザーランド',
                'cast2' => 'レスリー・ホープ',
                'cast3' => 'サラ・クラーク',
                'staff' => '',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '24',
                'introduction' => '全ての出来事がリアルタイムで進行し、1話で1時間、1シーズン24話で1日の出来事を描く。全世界で最も有名なリアルタイムサスペンスと言える。予測不能な事態に捜査官たちは基本的に不眠不休で対処する。',
                'image_path' => $img . '24_s' . $i . '.jpg',
                'copyright' => '2020 Twentieth Century Fox Film Corporation. All rights reserved.',
                'url' => 'https://ja.wikipedia.org/wiki/24_-TWENTY_FOUR-'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2001/11/6';
                    break;
                case 2:
                    $drama->onair = '2002/10/29';
                    break;
                case 3:
                    $drama->onair = '2003/10/28';
                    break;
                case 4:
                    $drama->onair = '2005/1/9';
                    break;
                case 5:
                    $drama->onair = '2006/1/15';
                    break;
                case 6:
                    $drama->onair = '2007/1/14';
                    break;
                case 7:
                    $drama->onair = '2009/1/11';
                    break;
                case 8:
                    $drama->onair = '2010/1/17';
                    break;
                case 9:
                    $drama->title = '24(リブ・アナザー・デイ)';
                    $drama->onair = '2014/5/5';
                    $drama->number = '12';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(1,2,4,24);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //ウォーキング・デッド(10シーズン)
        for($i=1; $i < 11; $i++){
            $drama = new \App\Drama([
                'title' => 'ウォーキング・デッド',
                'season' => $i,
                'title_en' => 'The Walking Dead',
                'cast1' => 'アンドリュー・リンカーン ',
                'cast2' => 'サラ・ウェイン・キャリーズ',
                'cast3' => 'チャンドラー・リッグス',
                'staff' => 'フランク・ダラボン',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '16',
                'introduction' => 'ジョージア州の保安官代理のリック・グリムスが勤務中の怪我による昏睡状態から目を覚ますと、文明は崩壊し、生ける屍「ウォーカー」が歩き回っていた。リックの自宅には家族はおらず、見知らぬ黒人親子モーガンとデュエインに出会う。彼らからウォーカーの事や自分の昏睡中の出来事を教えてもらい、家族が避難していると思われるアトランタを目指して出発する。',
                'image_path' => $img . 'The_Walking_Dead_s' . $i . '.jpg',
                'copyright' => 'AMC Film Holdings LLC.2018-10.All Rights Reserved.',
                'url' => 'https://ja.wikipedia.org/wiki/ウォーキング・デッド'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2010/10/31';
                    $drama->number = '6';
                    break;
                case 2:
                    $drama->onair = '2011/10/16';
                    $drama->number = '13';
                    break;
                case 3:
                    $drama->onair = '2012/10/14';
                    break;
                case 4:
                    $drama->onair = '2013/10/13';
                    break;
                case 5:
                    $drama->onair = '2014/10/12';
                    break;
                case 6:
                    $drama->onair = '2015/10/11';
                    break;
                case 7:
                    $drama->onair = '2016/10/23';
                    break;
                case 8:
                    $drama->onair = '2017/10/22';
                    break;
                case 9:
                    $drama->onair = '2018/10/7';
                    break;
                case 10:
                    $drama->onair = '2019/10/6';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(18,19,21,23,24,25);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //ブラックリスト(7シーズン)
        for($i=1; $i < 8; $i++){
            $drama = new \App\Drama([
                'title' => 'ブラックリスト',
                'season' => $i,
                'title_en' => 'THE BLACKLIST',
                'cast1' => 'ジェームズ・スペイダー',
                'cast2' => 'メーガン・ブーン',
                'cast3' => 'ディエゴ・クラテンホフ',
                'staff' => 'ジョン・ボーケンキャンプ',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '22',
                'introduction' => '国際的な凶悪犯罪に関わり指名手配されていたレッド（レイモンド）・レディントンが、突如FBIに出頭し、自分が関わった凶悪犯罪事件の犯人の"ブラックリスト"の情報に基づき、免責と引き換えに事件解決に協力すると申し出る。自分との連絡担当にはその日配属されたばかりの新米捜査官、リズ（エリザベス）・キーンを指名する。レッドの情報提供に基づく事件解決のため、FBIの特別チームが結成される。',
                'image_path' => $img . 'THE_BLACKLIST_s' . $i . '.jpg',
                'copyright' => '2019 Sony Pictures Television Inc. and Open 4 Business Productions LLC. All Rights Reserved.',
                'url' => 'https://ja.wikipedia.org/wiki/THE_BLACKLIST/ブラックリスト'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2013/9/23';
                    break;
                case 2:
                    $drama->onair = '2014/9/22';
                    break;
                case 3:
                    $drama->onair = '2015/10/1';
                    $drama->number = '23';
                    break;
                case 4:
                    $drama->onair = '2016/9/22';
                    break;
                case 5:
                    $drama->onair = '2017/9/27';
                    break;
                case 6:
                    $drama->onair = '2019/1/3';
                    break;
                case 7:
                    $drama->onair = '2019/10/4';
                    $drama->number = '19';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(1,2,4,24);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //ロスト(6シーズン)
        for($i=1; $i < 7; $i++){
            $drama = new \App\Drama([
                'title' => 'ロスト',
                'season' => $i,
                'title_en' => 'LOST',
                'cast1' => 'ナヴィーン・アンドリュース',
                'cast2' => 'エミリー・デ・レイヴィン',
                'cast3' => 'マシュー・フォックス',
                'staff' => 'J・J・エイブラムス',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '',
                'introduction' => 'シドニー発ロサンゼルス行きオーシャニック815便のボーイング777-200型機が南太平洋の島に墜落。48人の生存者は救助隊が来ると楽観視しているが、夜になると怪奇現象が起き、怯える者も少なくなかった。',
                'image_path' => $img . 'LOST_s' . $i . '.jpg',
                'copyright' => '',
                'url' => 'https://ja.wikipedia.org/wiki/LOST'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2004/9/22';
                    $drama->number = '25';
                    break;
                case 2:
                    $drama->onair = '2005/9/21';
                    $drama->number = '24';
                    break;
                case 3:
                    $drama->onair = '2006/10/4';
                    $drama->number = '23';
                    break;
                case 4:
                    $drama->onair = '2008/1/31';
                    $drama->number = '14';
                    break;
                case 5:
                    $drama->onair = '2009/1/21';
                    $drama->number = '17';
                    break;
                case 6:
                    $drama->onair = '2010/2/2';
                    $drama->number = '18';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(8,25);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //パーソン・オブ・インタレスト 犯罪予知ユニット(5シーズン)
        for($i=1; $i < 6; $i++){
            $drama = new \App\Drama([
                'title' => 'パーソン・オブ・インタレスト 犯罪予知ユニット',
                'season' => $i,
                'title_en' => 'PERSON of INTEREST',
                'cast1' => 'ジム・カヴィーゼル',
                'cast2' => 'マイケル・エマーソン',
                'cast3' => 'タラジ・P・ヘンソン',
                'staff' => 'J・J・エイブラムス',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '23',
                'introduction' => 'ジョン・リース（ジム・カヴィーゼル）は、元グリーンベレーでCIAの現地工作員であり、とある事件により死亡したとされたが、実はニューヨーク市の遺棄された建物の中で生活している。孤独な億万長者のコンピュータの天才、ハロルド・フィンチ（マイケル・エマーソン）は彼に近づき仕事を持ちかけた。フィンチは9.11の後、国内のあらゆる監視装置から収集した情報を分析して将来のテロ攻撃を予測する政府のコンピュータシステムを構築したと説明する。そのコンピュータはテロ以外の普通の計画的犯罪をも検知する。',
                'image_path' => $img . 'PERSON_of_INTEREST_s' . $i . '.jpg',
                'copyright' => '2016 Warner Bros.Entertainment Inc. All rights reserved.',
                'url' => 'https://ja.wikipedia.org/wiki/PERSON_of_INTEREST_犯罪予知ユニット'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2011/9/22';
                    break;
                case 2:
                    $drama->onair = '2012/9/27';
                    $drama->number = '22';
                    break;
                case 3:
                    $drama->onair = '2013/9/24';
                    break;
                case 4:
                    $drama->onair = '2014/9/23';
                    $drama->number = '22';
                    break;
                case 5:
                    $drama->onair = '2016/5/3';
                    $drama->number = '13';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(1,2,24,25);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //ハウス・オブ・カード 野望の階段(6シーズン)
        for($i=1; $i < 7; $i++){
            $drama = new \App\Drama([
                'title' => 'ハウス・オブ・カード 野望の階段',
                'season' => $i,
                'title_en' => 'House of Cards',
                'cast1' => 'ケヴィン・スペイシー',
                'cast2' => 'ロビン・ライト',
                'cast3' => 'ケイト・マーラ',
                'staff' => 'ボー・ウィリモン',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '13',
                'introduction' => '主人公フランク・アンダーウッド（ケヴィン・スペイシー）はホワイトハウス入りを目指す下院議員。大統領候補ウォーカーを応援し、彼が当選したあかつきには国務長官のポストをもらう約束をしていた。しかし、大統領に当選したウォーカーはフランクを裏切り、別の人物を候補とする。耐えがたい屈辱を味わったフランクは、NPO法人「クリーン・ウォーター」の代表を務めるキャリア・ウーマンである妻クレア（ロビン・ライト）とともに権謀術数を駆使してホワイトハウス入りを目指す。',
                'image_path' => $img . 'House_of_Cards_s' . $i . '.jpg',
                'copyright' => '2016 Sony Pictures Entertainment (Japan) Inc. All rights reserved.',
                'url' => 'https://ja.wikipedia.org/wiki/ハウス・オブ・カード_野望の階段'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2013/2/1';
                    break;
                case 2:
                    $drama->onair = '2014/2/14';
                    break;
                case 3:
                    $drama->onair = '2015/2/27';
                    break;
                case 4:
                    $drama->onair = '2016/3/4';
                    break;
                case 5:
                    $drama->onair = '2017/5/30';
                    break;
                case 6:
                    $drama->onair = '2018/11/2';
                    $drama->number = '8';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(2,13,15);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //メンタリスト(7シーズン)
        for($i=1; $i < 8; $i++){
            $drama = new \App\Drama([
                'title' => 'メンタリスト',
                'season' => $i,
                'title_en' => 'The Mentalist',
                'cast1' => 'サイモン・ベイカー',
                'cast2' => 'ロビン・タニー',
                'cast3' => 'ティム・カン',
                'staff' => 'クリス・ロング',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '23',
                'introduction' => 'カリフォルニア州捜査局（通称・CBI）の犯罪コンサルタント、パトリック・ジェーン。青い瞳と爽やかな笑顔が似合うイケメンだが、元詐欺師で以前は自身を霊能者(サイキック)と偽り活躍していた。妻と娘を殺した宿敵レッド・ジョンを追うため、CBIのコンサルタントとなり、人間心理を巧みに操る観察眼と推理力を持つ「メンタリスト」として型破りな捜査で犯人を追う。',
                'image_path' => $img . 'The_Mentalist_s' . $i . '.jpg',
                'copyright' => '2016 Warner Bros.Entertainment Inc. All rights reserved.',
                'url' => 'https://ja.wikipedia.org/wiki/メンタリスト_(テレビドラマ)'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2008/9/23';
                    break;
                case 2:
                    $drama->onair = '2009/9/24';
                    break;
                case 3:
                    $drama->onair = '2010/9/23';
                    $drama->number = '24';
                    break;
                case 4:
                    $drama->onair = '2011/9/22';
                    $drama->number = '24';
                    break;
                case 5:
                    $drama->onair = '2012/9/30';
                    $drama->number = '22';
                    break;
                case 6:
                    $drama->onair = '2013/9/29';
                    $drama->number = '22';
                    break;
                case 7:
                    $drama->onair = '2014/11/30';
                    $drama->number = '13';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(1,2,4);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

        //スーツ(9シーズン)
        for($i=1; $i < 10; $i++){
            $drama = new \App\Drama([
                'title' => 'スーツ',
                'season' => $i,
                'title_en' => 'SUITS',
                'cast1' => 'ガブリエル・マクト',
                'cast2' => 'パトリック・J・アダムス',
                'cast3' => 'リック・ホフマン',
                'staff' => '',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '16',
                'introduction' => 'ハーヴィー・スペクターは、マンハッタンの大手法律事務所ピアソン・ハードマンで働く敏腕弁護士。難しい訴訟を解決に導くクローザー[要曖昧さ回避]として一目置かれる存在だが、部下を持ちたがらず、面倒も一切見ない一匹狼だった。 そんな彼を見るに見かねた所長のジェシカは、シニア・パートナーへの昇進と引き換えに部下のアソシエイトを雇うことを命じ、仕方なくハーヴィーはアソシエイトの面接を始める。マイク・ロスはたったひとりの肉親である祖母の入院費を稼ぐため、友人の勧めでマリファナの運び屋まがいの仕事を引き受けていたが、それが警察の罠であることを見抜き、偶然ハーヴィーの面接会場へと逃げこむ。そこでハーヴィーは、マイクが天才的な頭脳を持っていることをすぐに見抜き、アソシエイトへの採用を決める。',
                'image_path' => $img . 'SUITS_s' . $i . '.jpg',
                'copyright' => '',
                'url' => 'https://ja.wikipedia.org/wiki/SUITS/スーツ'
            ]);
            switch($i){
                case 1:
                    $drama->onair = '2011/6/23';
                    $drama->number = '12';
                    $drama->copyright = '2011 Universal Studios. All Rights Reserved.';
                    break;
                case 2:
                    $drama->onair = '2012/6/14';
                    $drama->copyright = '2012 Universal Studios. All Rights Reserved.';
                    break;
                case 3:
                    $drama->onair = '2013/7/16';
                    $drama->copyright = '2013 Universal Studios. All Rights Reserved.';
                    break;
                case 4:
                    $drama->onair = '2014/6/11';
                    $drama->copyright = '2014 Universal Studios. All Rights Reserved.';
                    break;
                case 5:
                    $drama->onair = '2015/6/24';
                    $drama->copyright = '2015 Universal Studios. All Rights Reserved.';
                    break;
                case 6:
                    $drama->onair = '2016/7/13';
                    $drama->copyright = '2016 Open 4 Business Productions, LLC. All Rights Reserved.';
                    break;
                case 7:
                    $drama->onair = '2017/7/12';
                    $drama->copyright = '2017 Open 4 Business Productions, LLC. All Rights Reserved.';
                    break;
                case 8:
                    $drama->onair = '2018/7/18';
                    $drama->copyright = '2018 Open 4 Business Productions, LLC. All Rights Reserved.';
                    break;
                case 9:
                    $drama->onair = '2019/7/17';
                    $drama->number = '10';
                    $drama->copyright = '2019 Open 4 Business Productions, LLC. All Rights Reserved.';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();

            $jan = array(9,11,15);
            for($j=1; $j <= $total_jan; $j++){
                if(in_array($j, $jan)){
                    $dramaJanre = new \App\DramaJanre([
                        'drama_id' => $drama->id,
                        'janre_id' => $j
                    ]);
                    $dramaJanre->save();
                }
            }
        }

/*下記はテンプレ
        //名探偵モンク(シーズン)
        for($i=1; $i < 9; $i++){
            $drama = new \App\Drama([
                'title' => '名探偵モンク',
                'season' => $i,
                'title_en' => 'MONK',
                'cast1' => '',
                'cast2' => '',
                'cast3' => '',
                'staff' => '',
                'country' => 'アメリカ',
                'onair' => '',
                'number' => '10',
                'introduction' => '',
                'image_path' => $img . 'game_of_thrones_s' . $i . '.jpg',
                'copyright' => '',
                'url' => ''
            ]);
            switch($i){
                case 1:
                    $drama->onair = '66';
                    $drama->number = '10';
                    break;
                case 2:
                    $drama->onair = '66';
                    $drama->number = '10';
                    break;
                case 3:
                    $drama->onair = '66';
                    $drama->number = '10';
                    break;
                case 4:
                    $drama->onair = '66';
                    $drama->number = '10';
                    break;
                case 5:
                    $drama->onair = '66';
                    $drama->number = '10';
                    break;
                case 6:
                    $drama->onair = '66';
                    $drama->number = '10';
                    break;
                case 7:
                    $drama->onair = '66';
                    $drama->number = '10';
                    break;
                case 8:
                    $drama->onair = '66';
                    $drama->number = '10';
                    break;
            }
            $drama->save();
            
            $socre = new \App\Score([
                'drama_id' => $drama->id,
                'rank_average_total_evaluation' => '9999' //初期値
            ]);
            $socre->save();
        }
*/

    }
}
