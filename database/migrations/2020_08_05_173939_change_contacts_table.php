<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            //null許容に変更
            $table->string('corporation')->nullable()->change();
            $table->string('corporation_kana')->nullable()->change();
            $table->string('phone')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            //null不可に変更
            $table->string('corporation')->nullable(false)->change();
            $table->string('corporation_kana')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
        });
    }
}
