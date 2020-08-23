<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(JanresTableSeeder::class); //drama挿入前に実行
        // $this->call(DramasTableSeeder::class); //drama作成と同時にscoresテーブルに初期値でレコード挿入(janre挿入後に実行)
        // $this->call(ReviewsTableSeeder::class); //UsersTableSeederでデータ挿入するため不要
        // $this->call(FavoritesTableSeeder::class); //UsersTableSeederでデータ挿入するため不要
        // $this->call(LikesTableSeeder::class); //UsersTableSeederでデータ挿入するため不要(後から手動登録したレビューに対していいねするときに利用)
        // $this->call(FollowsTableSeeder::class); //UsersTableSeederでデータ挿入するため不要
        // $this->call(DramaJanreTableSeeder::class); //dramaでデータ挿入するため不要
        // $this->call(UsersTableSeeder::class); //drama,janreを挿入してから実行
        // $this->call(RequestsTableSeeder::class); //動作確認テスト用
        // $this->call(ContactsTableSeeder::class); //動作確認テスト用
         $this->call(ScoresTableSeeder::class); //更新用なので何度でも実行可能。drama,user,favorite,like,review,followを挿入してから実行
        // $this->call(TestSeeder::class); //諸々の動作確認テスト用
    }
}
