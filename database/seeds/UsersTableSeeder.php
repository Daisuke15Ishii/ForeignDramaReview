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
        //レコード1
        $user = new \App\User([
            'name' => 'seeder1',
            'email' => 'seeder1@gmail.com',
            'password' => 'seedertest1',
            'name_kana' => 'シーダーイチ',
            'penname' => 'seeder1',
            'gender' => 'female',
            'birth' => '2000' . '-01' . '-01 00:00:01',
            'profile' => 'シーダー1のテスト',
        ]);
        $user->save();

    }
}
