<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //reviewsテーブルにカラム追加
        Schema::table('reviews', function (Blueprint $table) {
            $table->biginteger('score_id')->unsigned(); //scoresテーブルに対する外部キー
        });

        //外部キー制約の追加
        Schema::table('reviews', function (Blueprint $table) {
            // scoresテーブルを消したとき、当テーブルの対象レコードも一緒に削除する(cascade)
            $table->foreign('score_id')->references('id')->on('scores')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropcolumn('score_id'); //scoresテーブルに対する外部キー
        });
    }
}
