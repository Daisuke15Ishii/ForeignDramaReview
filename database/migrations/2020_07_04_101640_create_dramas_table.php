<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dramas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title'); // ドラマのタイトル
            $table->integer('season'); // ドラマのシーズン数
            $table->string('title_en')->nullable(); // ドラマのタイトル(アルファベット)
            $table->string('cast1')->nullable(); // 出演者1
            $table->string('cast2')->nullable(); // 出演者2
            $table->string('cast3')->nullable(); // 出演者3
            $table->string('staff')->nullable(); // 監督等
            $table->string('country')->nullable(); // 国
            $table->date('onair')->nullable(); // 放映日
            $table->integer('number')->nullable(); // 話数
            $table->text('introduction')->nullable(); // 作品概要 
            $table->string('image_path')->nullable(); // 作品画像
            $table->string('copyright')->nullable(); // 版権元
            $table->string('url')->nullable(); // 参考URL(wikipedia)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dramas');
    }
}
