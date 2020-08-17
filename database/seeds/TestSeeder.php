<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //fakerでテストユーザー作成
        $faker = Faker\Factory::create('ja_JP');
        for($i=1; $i < 3; $i++){
            //user作成
            $user = new \App\User([
                'name' => $faker->name . '(test)',
                'email' => $faker->safeEmail,
                'password' => Hash::make('fakertest1'),
                'name_kana' => 'シーダーテスト',
                'penname' => $faker->kanaName . '(test)',
                'gender' => $faker->randomElement($gender=['male','female']),
                'birth' => $faker->dateTimeBetween('-80 years', '-20years')->format('Y-m-d'),
                'profile' => '(test文)' . $faker->realText(rand(30,200))
            ]);
            $user->save();
        }
        //
    }
}
