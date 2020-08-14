<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //fakerでテストユーザー作成(users,reviews,favorites,likes,followsの各テーブルへ登録)
        $faker = Faker\Factory::create('ja_JP');
        for($i=1; $i < 20; $i++){
            //user作成
            $user = new \App\User([
                'name' => $faker->name . '(test)',
                'email' => $faker->safeEmail,
                'password' => 'fakertest1',
                'name_kana' => 'シーダーテスト',
                'penname' => $faker->kanaName . '(test)',
                'gender' => $faker->randomElement($gender=['male','female']),
                'birth' => $faker->dateTimeBetween('-80 years', '-20years')->format('Y-m-d'),
                'profile' => '(test文)' . $faker->realText(rand(30,200))
            ]);
            $user->save();
            
            
            
            //userのレビュー(reviewとfavorite)作成
            $dramas = \App\Drama::all();
            foreach($dramas as $drama){
                if(rand(0,1) == 1){
                    //乱数が1の場合のみ、reviewとfavoriteレコードを作成
                    $review = new \App\Review([
                        'drama_id' => $drama->id,
                        'user_id' => $user->id,
                        'score_id' => $drama->id, //dramaレコード作成時と同時にscoreレコードも作成するためidは同じ
                        'total_evaluation' => $faker->numberBetween(10, 100), //二桁の乱数
                        'story_evaluation' => $faker->numberBetween(1, 10) / 2, //0～5の乱数(0.5刻み)
                        'world_evaluation' => $faker->numberBetween(1, 10) / 2,
                        'cast_evaluation' => $faker->numberBetween(1, 10) / 2,
                        'char_evaluation' => $faker->numberBetween(1, 10) / 2,
                        'visual_evaluation' => $faker->numberBetween(1, 10) / 2,
                        'music_evaluation' => $faker->numberBetween(1, 10) / 2,
            
                        'progress' => $faker->numberBetween(0, 4),
                        'subtitles' => $faker->randomElement($subtitles=['0','1']),
                        'review_title' => $faker->realText(rand(10,40)),
                        'review_comment' => $faker->realText(rand(30,200)),
                        'spoiler_alert' => $faker->randomElement($spoiler_alert=['0','1']),
                        'previous' => $faker->numberBetween(0, 3)
                    ]);
                    $review->save();
    
                    
                    //favoriteテーブルに追加
                    $favorite = new \App\Favorite([
                        'drama_id' => $drama->id,
                        'user_id' => $user->id,
                        'review_id' => $review->id,
                        'uncategorized' => 0, //初期化で仮入力
                        'favorite' => $faker->numberBetween(0, 1),
                        'comment' => $faker->realText(rand(10,200))
                    ]);
                    switch($review->progress){
                        case 0:
                            //未分類
                            $favorite->uncategorized = 1;
                            break;
                        case 1:
                            //未視聴
                            $favorite->want = 1;
                            break;
                        case 2:
                            //視聴断念
                            $favorite->stop = 1;
                            break;
                        case 3:
                            //視聴中
                            $favorite->watching = 1;
                            break;
                        case 4:
                            //視聴済
                            $favorite->watched = 1;
                            break;
                    }
                    $favorite->save();
                }
            }
            
            //like作成
            $allreviews = \App\Review::all();
            foreach($allreviews as $re){
                if(rand(0,1) == 1){
                    //乱数が1の場合のみ、reviewとfavoriteレコードを作成
                    $like = new \App\Like([
                        'user_id' => $user->id,
                        'review_id' => $re->id
                    ]);
                    $like->save();
                }
            }


            //follow作成
            $allusers = \App\User::all();
            foreach($allusers as $us){
                if(rand(0,1) == 1){
                    //乱数が1の場合のみ、reviewとfavoriteレコードを作成]
                    if($us->id !== $user->id){
                        $follow = new \App\Follow([
                            //今回新規登録したユーザー「user_id」が「following_user_id」をフォローする
                            'user_id' => $user->id,
                            'following_user_id' => $us->id
                        ]);
                        $follow->save();
                    }
                }
            }
        }
    }
}
