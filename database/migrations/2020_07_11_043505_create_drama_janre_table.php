<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDramaJanreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drama_janre', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('drama_id')->unsigned(); //dramasテーブルに対する外部キー
            $table->biginteger('janre_id')->unsigned(); //janresテーブルに対する外部キー 

            $table->timestamps();
        });
        
        //外部キー制約の追加
        Schema::table('drama_janre', function (Blueprint $table) {
            // dramasテーブルもしくはjanresテーブルを消したとき、当テーブルの対象レコードも一緒に削除する(cascade)
            $table->foreign('drama_id')->references('id')->on('dramas')->onDelete('cascade');
            $table->foreign('janre_id')->references('id')->on('janres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drama_janres');
    }
}
