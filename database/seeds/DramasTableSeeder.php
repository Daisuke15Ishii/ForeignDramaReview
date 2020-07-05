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
            'image_path' => 'public/image/breaking_bad_s1.jpg',
            'copyright' => 'Sony Pictures Television Inc.',
            'url' => 'https://ja.wikipedia.org/wiki/ブレイキング・バッド'
        ]);
        $drama->save();
        
    }
}
