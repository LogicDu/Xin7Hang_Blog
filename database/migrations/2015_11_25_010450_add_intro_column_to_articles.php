<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIntroColumnToArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('intro');
            $table->integer('status');
            $table->integer('readed_num');
            $table->integer('like_num');
            $table->string('tags');
            $table->string('url_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('intro');
            $table->dropColumn('status');
            $table->dropColumn('readed_num');
            $table->dropColumn('like_num');
            $table->dropColumn('tags');
            $table->dropColumn('url_name');
        });
    }
}
