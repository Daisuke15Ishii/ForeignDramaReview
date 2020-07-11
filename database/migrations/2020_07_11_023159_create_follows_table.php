<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned(); //usersテーブルに対する外部キー
            $table->biginteger('following_user_id')->unsigned(); //reviewテーブルに対する外部キー 

            $table->timestamps();
        });
        
        //外部キー制約の追加
        Schema::table('follows', function (Blueprint $table) {
            // usersテーブルを消したとき、当テーブルの対象レコードも一緒に削除する(cascade)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
