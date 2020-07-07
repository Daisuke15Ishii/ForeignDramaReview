<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('drama_id')->unsigned(); //dramasテーブルに対する外部キー 
            $table->biginteger('user_id')->unsigned(); //usersテーブルに対する外部キー
            $table->integer('total_evaluation')->nullable(); // 総合評価
            $table->double('story_evaluation', 6, 2)->nullable(); // シナリオ評価
            $table->double('world_evaluation', 6, 2)->nullable(); // 世界観評価
            $table->double('cast_evaluation', 6, 2)->nullable(); // 演者評価
            $table->double('char_evaluation', 6, 2)->nullable(); // キャラ評価
            $table->double('visual_evaluation', 6, 2)->nullable(); // 映像美評価
            $table->double('music_evaluation', 6, 2)->nullable(); // 音楽評価
            $table->integer('progress'); // 現在の進捗
            $table->boolean('subtitles')->nullable(); // 字幕・吹替
            $table->string('review_title')->nullable(); // レビュータイトル
            $table->text('review_comment')->nullable(); // レビュー内容
            $table->boolean('spoiler_alert')->nullable(); // ネタバレの有無
            $table->integer('previous')->nullable(); // 前作視聴の必要性

            $table->timestamps();
        });
        
        
        //外部キー制約の追加
        Schema::table('reviews', function (Blueprint $table) {
            // usersテーブルもしくはdramasテーブルを消したとき、当テーブルの対象レコードも一緒に削除する(cascade)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('drama_id')->references('id')->on('dramas')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
