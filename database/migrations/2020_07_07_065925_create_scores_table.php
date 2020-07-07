<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('drama_id')->unsigned(); //dramasテーブルに対する外部キー 
            $table->double('average_total_evaluation', 6, 2)->default(0); // 総合評価(平均)
            $table->double('median_total_evaluation', 6, 2)->default(0); // 総合評価(中央値)
            $table->double('average_story_evaluation', 6, 2)->default(0); // シナリオ評価(平均)
            $table->double('average_world_evaluation', 6, 2)->default(0); // 世界観評価(平均)
            $table->double('average_cast_evaluation', 6, 2)->default(0); // 演者評価(平均)
            $table->double('average_char_evaluation', 6, 2)->default(0); // キャラ評価(平均)
            $table->double('average_visual_evaluation', 6, 2)->default(0); // 映像美評価(平均)
            $table->double('average_music_evaluation', 6, 2)->default(0); // 音楽評価(平均)
            $table->integer('reviews')->default(0); // レビュー数
            $table->integer('registers')->default(0); // 作品登録者数
            $table->integer('favorites')->default(0); // お気に入り登録者数
            $table->integer('rank_average_total_evaluation'); // 総合評価(平均)ランキング
            $table->integer('previous_require')->default(0); // 前作視聴(必須)数
            $table->integer('previous_better')->default(0); // 前作視聴(観た方が良い)数
            $table->integer('previous_no')->default(0); // 前作視聴(不要)数

            $table->timestamps();
        });
        
        //外部キー制約の追加
        Schema::table('scores', function (Blueprint $table) {
            // dramasテーブルを消したとき、当テーブルの対象レコードも一緒に削除する(cascade)
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
        Schema::dropIfExists('scores');
    }
}
