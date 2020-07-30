<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //user_id=xの全レビューに対して、各ユーザーがランダムでlike(いいね)をする
        $x = 1;
        $reviews = \App\Review::where('user_id', $x)->get();
        foreach($reviews as $review){
            $users = \App\User::all();
            foreach($users as $user){
                if(rand(0,1) == 1){
                    //乱数が1の場合のみ、reviewにいいねをする
                    if($user->id !== $x){ //自分のレビューにはいいねしない
                        $like = new \App\Like([
                            'user_id' => $user->id,
                            'review_id' => $review->id
                        ]);
                        $like->save();
                    }
                }
            }
        }
    }
}
