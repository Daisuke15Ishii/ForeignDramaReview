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
        //レコード1
        $drama = new \App\Drama([
            'title' => 'ブレイキング・バッド',
            'season' => '1',
            'title_en' => 'Breaking Bad',
            'cast1' => 'ブライアン・クランストン',
            'cast2' => 'アーロン・ポール',
            'cast3' => 'ボブ・オデンカーク',
            'staff' => 'ヴィンス・ギリガン',
            'country' => 'アメリカ',
            'onair' => '2008/1/20',
            'number' => '7',
            'introduction' => '舞台は2008年のニューメキシコ州アルバカーキ。偉大な成功を遂げるはずだった天才化学者ウォルター・ホワイトは、人生に敗れ、50歳になる現在、心ならずも高校の化学教師の職に就いている[1]。妊娠中の妻、脳性麻痺の息子、多額の住宅ローンを抱え、洗車場のアルバイトを掛け持ちしていても、なお家計にはゆとりがない。ある日、ステージIIIAの肺癌で余命2～3年と診断され、自身の医療費と家族の経済的安定を確保するために多額の金が必要になる。義弟ハンクや旧友エリオットが費用の援助を買って出るが、あくまで自力で稼ぎたいウォルターはそれらを拒み、代わりにメタンフェタミン（通称メス）の製造・販売に望みをかける。麻薬取引については何も知らず、元教え子の売人ジェシー・ピンクマンを相棒にして、家族に秘密でビジネスを開始。裏社会での名乗りは ｢ハイゼンベルク｣。',
            'image_path' => '/images/breaking_bad_s1.jpg',
            'copyright' => 'Sony Pictures Television Inc.',
            'url' => 'https://ja.wikipedia.org/wiki/ブレイキング・バッド'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード2
        $drama = new \App\Drama([
            'title' => 'ブレイキング・バッド',
            'season' => '2',
            'title_en' => 'Breaking Bad',
            'cast1' => 'ブライアン・クランストン',
            'cast2' => 'アーロン・ポール',
            'cast3' => 'ボブ・オデンカーク',
            'staff' => 'ヴィンス・ギリガン',
            'country' => 'アメリカ',
            'onair' => '2009/3/1',
            'number' => '13',
            'introduction' => '舞台は2008年のニューメキシコ州アルバカーキ。偉大な成功を遂げるはずだった天才化学者ウォルター・ホワイトは、人生に敗れ、50歳になる現在、心ならずも高校の化学教師の職に就いている[1]。妊娠中の妻、脳性麻痺の息子、多額の住宅ローンを抱え、洗車場のアルバイトを掛け持ちしていても、なお家計にはゆとりがない。ある日、ステージIIIAの肺癌で余命2～3年と診断され、自身の医療費と家族の経済的安定を確保するために多額の金が必要になる。義弟ハンクや旧友エリオットが費用の援助を買って出るが、あくまで自力で稼ぎたいウォルターはそれらを拒み、代わりにメタンフェタミン（通称メス）の製造・販売に望みをかける。麻薬取引については何も知らず、元教え子の売人ジェシー・ピンクマンを相棒にして、家族に秘密でビジネスを開始。裏社会での名乗りは ｢ハイゼンベルク｣。',
            'image_path' => '/images/breaking_bad_s2.jpg',
            'copyright' => 'Sony Pictures Television Inc.',
            'url' => 'https://ja.wikipedia.org/wiki/ブレイキング・バッド'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード3
        $drama = new \App\Drama([
            'title' => 'ブレイキング・バッド',
            'season' => '3',
            'title_en' => 'Breaking Bad',
            'cast1' => 'ブライアン・クランストン',
            'cast2' => 'アーロン・ポール',
            'cast3' => 'ボブ・オデンカーク',
            'staff' => 'ヴィンス・ギリガン',
            'country' => 'アメリカ',
            'onair' => '2010/3/1',
            'number' => '13',
            'introduction' => '舞台は2008年のニューメキシコ州アルバカーキ。偉大な成功を遂げるはずだった天才化学者ウォルター・ホワイトは、人生に敗れ、50歳になる現在、心ならずも高校の化学教師の職に就いている[1]。妊娠中の妻、脳性麻痺の息子、多額の住宅ローンを抱え、洗車場のアルバイトを掛け持ちしていても、なお家計にはゆとりがない。ある日、ステージIIIAの肺癌で余命2～3年と診断され、自身の医療費と家族の経済的安定を確保するために多額の金が必要になる。義弟ハンクや旧友エリオットが費用の援助を買って出るが、あくまで自力で稼ぎたいウォルターはそれらを拒み、代わりにメタンフェタミン（通称メス）の製造・販売に望みをかける。麻薬取引については何も知らず、元教え子の売人ジェシー・ピンクマンを相棒にして、家族に秘密でビジネスを開始。裏社会での名乗りは ｢ハイゼンベルク｣。',
            'image_path' => '/images/breaking_bad_s3.jpg',
            'copyright' => 'Sony Pictures Television Inc.',
            'url' => 'https://ja.wikipedia.org/wiki/ブレイキング・バッド'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード4
        $drama = new \App\Drama([
            'title' => 'ブレイキング・バッド',
            'season' => '4',
            'title_en' => 'Breaking Bad',
            'cast1' => 'ブライアン・クランストン',
            'cast2' => 'アーロン・ポール',
            'cast3' => 'ボブ・オデンカーク',
            'staff' => 'ヴィンス・ギリガン',
            'country' => 'アメリカ',
            'onair' => '2011/7/1',
            'number' => '13',
            'introduction' => '舞台は2008年のニューメキシコ州アルバカーキ。偉大な成功を遂げるはずだった天才化学者ウォルター・ホワイトは、人生に敗れ、50歳になる現在、心ならずも高校の化学教師の職に就いている[1]。妊娠中の妻、脳性麻痺の息子、多額の住宅ローンを抱え、洗車場のアルバイトを掛け持ちしていても、なお家計にはゆとりがない。ある日、ステージIIIAの肺癌で余命2～3年と診断され、自身の医療費と家族の経済的安定を確保するために多額の金が必要になる。義弟ハンクや旧友エリオットが費用の援助を買って出るが、あくまで自力で稼ぎたいウォルターはそれらを拒み、代わりにメタンフェタミン（通称メス）の製造・販売に望みをかける。麻薬取引については何も知らず、元教え子の売人ジェシー・ピンクマンを相棒にして、家族に秘密でビジネスを開始。裏社会での名乗りは ｢ハイゼンベルク｣。',
            'image_path' => '/images/breaking_bad_s4.jpg',
            'copyright' => 'Sony Pictures Television Inc.',
            'url' => 'https://ja.wikipedia.org/wiki/ブレイキング・バッド'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード5
        $drama = new \App\Drama([
            'title' => 'ブレイキング・バッド',
            'season' => '5',
            'title_en' => 'Breaking Bad',
            'cast1' => 'ブライアン・クランストン',
            'cast2' => 'アーロン・ポール',
            'cast3' => 'ボブ・オデンカーク',
            'staff' => 'ヴィンス・ギリガン',
            'country' => 'アメリカ',
            'onair' => '2012/7/16',
            'number' => '16',
            'introduction' => '舞台は2008年のニューメキシコ州アルバカーキ。偉大な成功を遂げるはずだった天才化学者ウォルター・ホワイトは、人生に敗れ、50歳になる現在、心ならずも高校の化学教師の職に就いている[1]。妊娠中の妻、脳性麻痺の息子、多額の住宅ローンを抱え、洗車場のアルバイトを掛け持ちしていても、なお家計にはゆとりがない。ある日、ステージIIIAの肺癌で余命2～3年と診断され、自身の医療費と家族の経済的安定を確保するために多額の金が必要になる。義弟ハンクや旧友エリオットが費用の援助を買って出るが、あくまで自力で稼ぎたいウォルターはそれらを拒み、代わりにメタンフェタミン（通称メス）の製造・販売に望みをかける。麻薬取引については何も知らず、元教え子の売人ジェシー・ピンクマンを相棒にして、家族に秘密でビジネスを開始。裏社会での名乗りは ｢ハイゼンベルク｣。',
            'image_path' => '/images/breaking_bad_s5.jpg',
            'copyright' => 'Sony Pictures Television Inc.',
            'url' => 'https://ja.wikipedia.org/wiki/ブレイキング・バッド'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード6
        $drama = new \App\Drama([
            'title' => 'ホームランド',
            'season' => '1',
            'title_en' => 'HOMELAND',
            'cast1' => 'クレア・デインズ',
            'cast2' => 'ダミアン・ルイス',
            'cast3' => 'マンディ・パティンキン',
            'staff' => 'ハワード・ゴードン',
            'country' => 'アメリカ',
            'onair' => '2011/10/2',
            'number' => '12',
            'introduction' => 'アルカーイダとのアメリカ国内での戦いが描かれる。CIAの作戦担当官キャリー・マティソンは、イラクで内通者からアメリカ人戦争捕虜がアルカーイダによって転向させられたとの情報を得る。だが命令違反の作戦を実行したため保護観察下に置かれ、バージニア州ラングレーのCIAテロ対策センターへ異動となる。上司であり、過去に恋愛関係にあったテロ対策センター指揮官デビッド・エスティースが、緊急のブリーフィングのためにキャリーを呼び出し、8年間行方不明であったアメリカ海兵隊軍曹ニコラス・ブロディが、テロリストのアブ・ナジールのアジトから救出されたことを告げる。キャリーは、ブロディが転向した戦争捕虜であると信じるようになる',
            'image_path' => '/images/HOMELAND_s1.jpg',
            'copyright' => 'Twentieth Century Fox Home Entertainment LLC.',
            'url' => 'https://ja.wikipedia.org/wiki/HOMELAND_(テレビドラマ)'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード7
        $drama = new \App\Drama([
            'title' => 'ホームランド',
            'season' => '2',
            'title_en' => 'HOMELAND',
            'cast1' => 'クレア・デインズ',
            'cast2' => 'ダミアン・ルイス',
            'cast3' => 'マンディ・パティンキン',
            'staff' => 'ハワード・ゴードン',
            'country' => 'アメリカ',
            'onair' => '2012/9/30',
            'number' => '12',
            'introduction' => 'アルカーイダとのアメリカ国内での戦いが描かれる。CIAの作戦担当官キャリー・マティソンは、イラクで内通者からアメリカ人戦争捕虜がアルカーイダによって転向させられたとの情報を得る。だが命令違反の作戦を実行したため保護観察下に置かれ、バージニア州ラングレーのCIAテロ対策センターへ異動となる。上司であり、過去に恋愛関係にあったテロ対策センター指揮官デビッド・エスティースが、緊急のブリーフィングのためにキャリーを呼び出し、8年間行方不明であったアメリカ海兵隊軍曹ニコラス・ブロディが、テロリストのアブ・ナジールのアジトから救出されたことを告げる。キャリーは、ブロディが転向した戦争捕虜であると信じるようになる',
            'image_path' => '/images/HOMELAND_s2.jpg',
            'copyright' => 'Twentieth Century Fox Home Entertainment LLC.',
            'url' => 'https://ja.wikipedia.org/wiki/HOMELAND_(テレビドラマ)'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード8
        $drama = new \App\Drama([
            'title' => 'ホームランド',
            'season' => '3',
            'title_en' => 'HOMELAND',
            'cast1' => 'クレア・デインズ',
            'cast2' => 'ダミアン・ルイス',
            'cast3' => 'マンディ・パティンキン',
            'staff' => 'ハワード・ゴードン',
            'country' => 'アメリカ',
            'onair' => '2013/9/29',
            'number' => '12',
            'introduction' => 'アルカーイダとのアメリカ国内での戦いが描かれる。CIAの作戦担当官キャリー・マティソンは、イラクで内通者からアメリカ人戦争捕虜がアルカーイダによって転向させられたとの情報を得る。だが命令違反の作戦を実行したため保護観察下に置かれ、バージニア州ラングレーのCIAテロ対策センターへ異動となる。上司であり、過去に恋愛関係にあったテロ対策センター指揮官デビッド・エスティースが、緊急のブリーフィングのためにキャリーを呼び出し、8年間行方不明であったアメリカ海兵隊軍曹ニコラス・ブロディが、テロリストのアブ・ナジールのアジトから救出されたことを告げる。キャリーは、ブロディが転向した戦争捕虜であると信じるようになる',
            'image_path' => '/images/HOMELAND_s3.jpg',
            'copyright' => 'Twentieth Century Fox Home Entertainment LLC.',
            'url' => 'https://ja.wikipedia.org/wiki/HOMELAND_(テレビドラマ)'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード9
        $drama = new \App\Drama([
            'title' => 'ホームランド',
            'season' => '4',
            'title_en' => 'HOMELAND',
            'cast1' => 'クレア・デインズ',
            'cast2' => 'ダミアン・ルイス',
            'cast3' => 'マンディ・パティンキン',
            'staff' => 'ハワード・ゴードン',
            'country' => 'アメリカ',
            'onair' => '2014/10/5',
            'number' => '12',
            'introduction' => 'アルカーイダとのアメリカ国内での戦いが描かれる。CIAの作戦担当官キャリー・マティソンは、イラクで内通者からアメリカ人戦争捕虜がアルカーイダによって転向させられたとの情報を得る。だが命令違反の作戦を実行したため保護観察下に置かれ、バージニア州ラングレーのCIAテロ対策センターへ異動となる。上司であり、過去に恋愛関係にあったテロ対策センター指揮官デビッド・エスティースが、緊急のブリーフィングのためにキャリーを呼び出し、8年間行方不明であったアメリカ海兵隊軍曹ニコラス・ブロディが、テロリストのアブ・ナジールのアジトから救出されたことを告げる。キャリーは、ブロディが転向した戦争捕虜であると信じるようになる',
            'image_path' => '/images/HOMELAND_s4.jpg',
            'copyright' => 'Twentieth Century Fox Home Entertainment LLC.',
            'url' => 'https://ja.wikipedia.org/wiki/HOMELAND_(テレビドラマ)'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード10
        $drama = new \App\Drama([
            'title' => 'ホームランド',
            'season' => '5',
            'title_en' => 'HOMELAND',
            'cast1' => 'クレア・デインズ',
            'cast2' => 'ダミアン・ルイス',
            'cast3' => 'マンディ・パティンキン',
            'staff' => 'ハワード・ゴードン',
            'country' => 'アメリカ',
            'onair' => '2015/10/4',
            'number' => '12',
            'introduction' => 'アルカーイダとのアメリカ国内での戦いが描かれる。CIAの作戦担当官キャリー・マティソンは、イラクで内通者からアメリカ人戦争捕虜がアルカーイダによって転向させられたとの情報を得る。だが命令違反の作戦を実行したため保護観察下に置かれ、バージニア州ラングレーのCIAテロ対策センターへ異動となる。上司であり、過去に恋愛関係にあったテロ対策センター指揮官デビッド・エスティースが、緊急のブリーフィングのためにキャリーを呼び出し、8年間行方不明であったアメリカ海兵隊軍曹ニコラス・ブロディが、テロリストのアブ・ナジールのアジトから救出されたことを告げる。キャリーは、ブロディが転向した戦争捕虜であると信じるようになる',
            'image_path' => '/images/HOMELAND_s5.jpg',
            'copyright' => 'Twentieth Century Fox Home Entertainment LLC.',
            'url' => 'https://ja.wikipedia.org/wiki/HOMELAND_(テレビドラマ)'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード11
        $drama = new \App\Drama([
            'title' => 'ホームランド',
            'season' => '6',
            'title_en' => 'HOMELAND',
            'cast1' => 'クレア・デインズ',
            'cast2' => 'ダミアン・ルイス',
            'cast3' => 'マンディ・パティンキン',
            'staff' => 'ハワード・ゴードン',
            'country' => 'アメリカ',
            'onair' => '2017/1/15',
            'number' => '12',
            'introduction' => 'アルカーイダとのアメリカ国内での戦いが描かれる。CIAの作戦担当官キャリー・マティソンは、イラクで内通者からアメリカ人戦争捕虜がアルカーイダによって転向させられたとの情報を得る。だが命令違反の作戦を実行したため保護観察下に置かれ、バージニア州ラングレーのCIAテロ対策センターへ異動となる。上司であり、過去に恋愛関係にあったテロ対策センター指揮官デビッド・エスティースが、緊急のブリーフィングのためにキャリーを呼び出し、8年間行方不明であったアメリカ海兵隊軍曹ニコラス・ブロディが、テロリストのアブ・ナジールのアジトから救出されたことを告げる。キャリーは、ブロディが転向した戦争捕虜であると信じるようになる',
            'image_path' => '/images/HOMELAND_s6.jpg',
            'copyright' => 'Twentieth Century Fox Home Entertainment LLC.',
            'url' => 'https://ja.wikipedia.org/wiki/HOMELAND_(テレビドラマ)'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード12
        $drama = new \App\Drama([
            'title' => 'ホームランド',
            'season' => '7',
            'title_en' => 'HOMELAND',
            'cast1' => 'クレア・デインズ',
            'cast2' => 'ダミアン・ルイス',
            'cast3' => 'マンディ・パティンキン',
            'staff' => 'ハワード・ゴードン',
            'country' => 'アメリカ',
            'onair' => '2018/2/11',
            'number' => '12',
            'introduction' => 'アルカーイダとのアメリカ国内での戦いが描かれる。CIAの作戦担当官キャリー・マティソンは、イラクで内通者からアメリカ人戦争捕虜がアルカーイダによって転向させられたとの情報を得る。だが命令違反の作戦を実行したため保護観察下に置かれ、バージニア州ラングレーのCIAテロ対策センターへ異動となる。上司であり、過去に恋愛関係にあったテロ対策センター指揮官デビッド・エスティースが、緊急のブリーフィングのためにキャリーを呼び出し、8年間行方不明であったアメリカ海兵隊軍曹ニコラス・ブロディが、テロリストのアブ・ナジールのアジトから救出されたことを告げる。キャリーは、ブロディが転向した戦争捕虜であると信じるようになる',
            'image_path' => '/images/HOMELAND_s7.jpg',
            'copyright' => 'Twentieth Century Fox Home Entertainment LLC.',
            'url' => 'https://ja.wikipedia.org/wiki/HOMELAND_(テレビドラマ)'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード
        $drama = new \App\Drama([
            'title' => 'ゲーム・オブ・スローンズ',
            'season' => '1',
            'title_en' => 'Game of Thrones',
            'cast1' => 'キット・ハリントン',
            'cast2' => 'エミリア・クラーク',
            'cast3' => 'ピーター・ディンクレイジ',
            'staff' => 'デイヴィッド・ベニオフ',
            'country' => 'アメリカ',
            'onair' => '2011/4/17',
            'number' => '10',
            'introduction' => '『氷と炎の歌』の物語は、ウェスタロスと呼ばれる大陸と、エッソスと呼ばれる大陸を主とした架空世界を舞台としている。物語には3つの主要な筋があり、次第に絡み合うようになる。第一は諸名家によるウェスタロスの王座を巡る争い、第二はウェスタロスの国境となる巨大な氷の〈壁〉の北での〈異形〉と呼ばれる脅威の増大、第三は13年前の内戦で殺された王の娘であるデナーリス・ターガリエンのウェスタロスへの帰還と玉座を求める野望である。',
            'image_path' => '/images/game_of_thrones_s1.jpg',
            'copyright' => 'Home Box Office, Inc. All rights reserved.',
            'url' => 'https://ja.wikipedia.org/wiki/ゲーム・オブ・スローンズ'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード
        $drama = new \App\Drama([
            'title' => 'ゲーム・オブ・スローンズ',
            'season' => '2',
            'title_en' => 'Game of Thrones',
            'cast1' => 'キット・ハリントン',
            'cast2' => 'エミリア・クラーク',
            'cast3' => 'ピーター・ディンクレイジ',
            'staff' => 'デイヴィッド・ベニオフ',
            'country' => 'アメリカ',
            'onair' => '2012/4/1',
            'number' => '10',
            'introduction' => '『氷と炎の歌』の物語は、ウェスタロスと呼ばれる大陸と、エッソスと呼ばれる大陸を主とした架空世界を舞台としている。物語には3つの主要な筋があり、次第に絡み合うようになる。第一は諸名家によるウェスタロスの王座を巡る争い、第二はウェスタロスの国境となる巨大な氷の〈壁〉の北での〈異形〉と呼ばれる脅威の増大、第三は13年前の内戦で殺された王の娘であるデナーリス・ターガリエンのウェスタロスへの帰還と玉座を求める野望である。',
            'image_path' => '/images/game_of_thrones_s2.jpg',
            'copyright' => 'Home Box Office, Inc. All rights reserved.',
            'url' => 'https://ja.wikipedia.org/wiki/ゲーム・オブ・スローンズ'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード
        $drama = new \App\Drama([
            'title' => 'ゲーム・オブ・スローンズ',
            'season' => '3',
            'title_en' => 'Game of Thrones',
            'cast1' => 'キット・ハリントン',
            'cast2' => 'エミリア・クラーク',
            'cast3' => 'ピーター・ディンクレイジ',
            'staff' => 'デイヴィッド・ベニオフ',
            'country' => 'アメリカ',
            'onair' => '2013/3/31',
            'number' => '10',
            'introduction' => '『氷と炎の歌』の物語は、ウェスタロスと呼ばれる大陸と、エッソスと呼ばれる大陸を主とした架空世界を舞台としている。物語には3つの主要な筋があり、次第に絡み合うようになる。第一は諸名家によるウェスタロスの王座を巡る争い、第二はウェスタロスの国境となる巨大な氷の〈壁〉の北での〈異形〉と呼ばれる脅威の増大、第三は13年前の内戦で殺された王の娘であるデナーリス・ターガリエンのウェスタロスへの帰還と玉座を求める野望である。',
            'image_path' => '/images/game_of_thrones_s3.jpg',
            'copyright' => 'Home Box Office, Inc. All rights reserved.',
            'url' => 'https://ja.wikipedia.org/wiki/ゲーム・オブ・スローンズ'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード
        $drama = new \App\Drama([
            'title' => 'ゲーム・オブ・スローンズ',
            'season' => '4',
            'title_en' => 'Game of Thrones',
            'cast1' => 'キット・ハリントン',
            'cast2' => 'エミリア・クラーク',
            'cast3' => 'ピーター・ディンクレイジ',
            'staff' => 'デイヴィッド・ベニオフ',
            'country' => 'アメリカ',
            'onair' => '2014/4/6',
            'number' => '10',
            'introduction' => '『氷と炎の歌』の物語は、ウェスタロスと呼ばれる大陸と、エッソスと呼ばれる大陸を主とした架空世界を舞台としている。物語には3つの主要な筋があり、次第に絡み合うようになる。第一は諸名家によるウェスタロスの王座を巡る争い、第二はウェスタロスの国境となる巨大な氷の〈壁〉の北での〈異形〉と呼ばれる脅威の増大、第三は13年前の内戦で殺された王の娘であるデナーリス・ターガリエンのウェスタロスへの帰還と玉座を求める野望である。',
            'image_path' => '/images/game_of_thrones_s4.jpg',
            'copyright' => 'Home Box Office, Inc. All rights reserved.',
            'url' => 'https://ja.wikipedia.org/wiki/ゲーム・オブ・スローンズ'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード
        $drama = new \App\Drama([
            'title' => 'ゲーム・オブ・スローンズ',
            'season' => '5',
            'title_en' => 'Game of Thrones',
            'cast1' => 'キット・ハリントン',
            'cast2' => 'エミリア・クラーク',
            'cast3' => 'ピーター・ディンクレイジ',
            'staff' => 'デイヴィッド・ベニオフ',
            'country' => 'アメリカ',
            'onair' => '2015/4/12',
            'number' => '10',
            'introduction' => '『氷と炎の歌』の物語は、ウェスタロスと呼ばれる大陸と、エッソスと呼ばれる大陸を主とした架空世界を舞台としている。物語には3つの主要な筋があり、次第に絡み合うようになる。第一は諸名家によるウェスタロスの王座を巡る争い、第二はウェスタロスの国境となる巨大な氷の〈壁〉の北での〈異形〉と呼ばれる脅威の増大、第三は13年前の内戦で殺された王の娘であるデナーリス・ターガリエンのウェスタロスへの帰還と玉座を求める野望である。',
            'image_path' => '/images/game_of_thrones_s5.jpg',
            'copyright' => 'Home Box Office, Inc. All rights reserved.',
            'url' => 'https://ja.wikipedia.org/wiki/ゲーム・オブ・スローンズ'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード
        $drama = new \App\Drama([
            'title' => 'ゲーム・オブ・スローンズ',
            'season' => '6',
            'title_en' => 'Game of Thrones',
            'cast1' => 'キット・ハリントン',
            'cast2' => 'エミリア・クラーク',
            'cast3' => 'ピーター・ディンクレイジ',
            'staff' => 'デイヴィッド・ベニオフ',
            'country' => 'アメリカ',
            'onair' => '2016/4/24',
            'number' => '10',
            'introduction' => '『氷と炎の歌』の物語は、ウェスタロスと呼ばれる大陸と、エッソスと呼ばれる大陸を主とした架空世界を舞台としている。物語には3つの主要な筋があり、次第に絡み合うようになる。第一は諸名家によるウェスタロスの王座を巡る争い、第二はウェスタロスの国境となる巨大な氷の〈壁〉の北での〈異形〉と呼ばれる脅威の増大、第三は13年前の内戦で殺された王の娘であるデナーリス・ターガリエンのウェスタロスへの帰還と玉座を求める野望である。',
            'image_path' => '/images/game_of_thrones_s6.jpg',
            'copyright' => 'Home Box Office, Inc. All rights reserved.',
            'url' => 'https://ja.wikipedia.org/wiki/ゲーム・オブ・スローンズ'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード
        $drama = new \App\Drama([
            'title' => 'ゲーム・オブ・スローンズ',
            'season' => '7',
            'title_en' => 'Game of Thrones',
            'cast1' => 'キット・ハリントン',
            'cast2' => 'エミリア・クラーク',
            'cast3' => 'ピーター・ディンクレイジ',
            'staff' => 'デイヴィッド・ベニオフ',
            'country' => 'アメリカ',
            'onair' => '2017/7/16',
            'number' => '7',
            'introduction' => '『氷と炎の歌』の物語は、ウェスタロスと呼ばれる大陸と、エッソスと呼ばれる大陸を主とした架空世界を舞台としている。物語には3つの主要な筋があり、次第に絡み合うようになる。第一は諸名家によるウェスタロスの王座を巡る争い、第二はウェスタロスの国境となる巨大な氷の〈壁〉の北での〈異形〉と呼ばれる脅威の増大、第三は13年前の内戦で殺された王の娘であるデナーリス・ターガリエンのウェスタロスへの帰還と玉座を求める野望である。',
            'image_path' => '/images/game_of_thrones_s7.jpg',
            'copyright' => 'Home Box Office, Inc. All rights reserved.',
            'url' => 'https://ja.wikipedia.org/wiki/ゲーム・オブ・スローンズ'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

        //レコード
        $drama = new \App\Drama([
            'title' => 'ゲーム・オブ・スローンズ',
            'season' => '8',
            'title_en' => 'Game of Thrones',
            'cast1' => 'キット・ハリントン',
            'cast2' => 'エミリア・クラーク',
            'cast3' => 'ピーター・ディンクレイジ',
            'staff' => 'デイヴィッド・ベニオフ',
            'country' => 'アメリカ',
            'onair' => '2019/4/14',
            'number' => '6',
            'introduction' => '『氷と炎の歌』の物語は、ウェスタロスと呼ばれる大陸と、エッソスと呼ばれる大陸を主とした架空世界を舞台としている。物語には3つの主要な筋があり、次第に絡み合うようになる。第一は諸名家によるウェスタロスの王座を巡る争い、第二はウェスタロスの国境となる巨大な氷の〈壁〉の北での〈異形〉と呼ばれる脅威の増大、第三は13年前の内戦で殺された王の娘であるデナーリス・ターガリエンのウェスタロスへの帰還と玉座を求める野望である。',
            'image_path' => '/images/game_of_thrones_s8.jpg',
            'copyright' => 'Home Box Office, Inc. All rights reserved.',
            'url' => 'https://ja.wikipedia.org/wiki/ゲーム・オブ・スローンズ'
        ]);
        $drama->save();

        $socre = new \App\Score([
            'drama_id' => $drama->id,
            'rank_average_total_evaluation' => '9999' //初期値
        ]);
        $socre->save();

    }
}
