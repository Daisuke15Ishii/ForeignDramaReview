<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('drama_id')->unsigned(); //dramasテーブルに対する外部キー 
            $table->biginteger('user_id')->unsigned(); //usersテーブルに対する外部キー
            $table->biginteger('review_id')->unsigned(); //reviewテーブルに対する外部キー 
            $table->boolean('want')->default(0); // 未視聴作品(状態：どれか一つのみが「１」)
            $table->boolean('watching')->default(0); // 視聴中作品(状態：どれか一つのみが「１」)
            $table->boolean('watched')->default(0); // 視聴済作品(状態：どれか一つのみが「１」)
            $table->boolean('stop')->default(0); // 視聴断念作品(状態：どれか一つのみが「１」)
            $table->boolean('uncategorized')->default(1); // 未分類作品(状態：どれか一つのみが「１」。初期値)
            $table->boolean('favorite')->default(0); // お気に入り登録の有無
            $table->string('comment')->nullable(); // 一言コメント(お気に入り登録作品のみ可)
            $table->timestamps();
        });
        
        //外部キー制約の追加
        Schema::table('favorites', function (Blueprint $table) {
            // usersテーブルもしくはdramasテーブルもしくはreviewsテーブルを消したとき、当テーブルの対象レコードも一緒に削除する(cascade)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('drama_id')->references('id')->on('dramas')->onDelete('cascade');
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
