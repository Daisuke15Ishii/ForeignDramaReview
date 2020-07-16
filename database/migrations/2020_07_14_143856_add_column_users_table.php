<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //usersテーブルにカラム追加
        Schema::table('users', function (Blueprint $table) {
            $table->string('name_kana'); //名前カナ
            $table->string('penname'); //ペンネーム
            $table->string('gender'); //性別
            $table->date('birth')->default('1990/01/01'); //誕生日
            $table->string('image')->nullable(); //アイコン画像
            $table->text('profile')->nullable(); //プロフィール文
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name_kana'); //名前カナ
            $table->string('penname'); //ペンネーム
            $table->string('gender'); //性別
            $table->date('birth')->default('1990/01/01'); //誕生日
            $table->string('image')->nullable(); //アイコン画像
            $table->text('profile')->nullable(); //プロフィール文
        });
    }
}
