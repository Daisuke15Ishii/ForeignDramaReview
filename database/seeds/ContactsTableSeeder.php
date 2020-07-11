<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //fakerを利用してテストデータを10件作成
        DB::table('contacts')->delete(); //前に作成したテストデータは邪魔なので一旦全部削除
        
        $faker = Faker\Factory::create('ja_JP');
        for ($i = 0; $i < 10; $i++){
            $contact = new \App\Contact([
                'corporation' => $faker->company,
                'corporation_kana' => 'ﾌﾒｲ',
                'name' => $faker->name,
                'name_kana' => $faker->kanaName,
                'phone' => $faker->phoneNumber,
                'mail' => $faker->safeEmail,
                'comment' => $faker->realText(300)
            ]);
            $contact->save();
        }
    }
}
