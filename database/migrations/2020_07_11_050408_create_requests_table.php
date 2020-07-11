<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned(); //usersテーブルに対する外部キー
            $table->string('title'); // ドラマのタイトル
            $table->integer('season'); // ドラマのシーズン数
            $table->string('cast')->nullable(); // 出演者
            $table->string('country')->nullable(); // 国
            $table->year('onair')->nullable(); // 放映年
            $table->string('url')->nullable(); // 参考URL(wikipedia)
            $table->text('comment')->nullable(); // その他 
            $table->timestamps();
        });
        
        //外部キー制約の追加
        Schema::table('requests', function (Blueprint $table) {
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
        Schema::dropIfExists('requests');
    }
}
