<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id');  /*負の値をとらないオプション*/
            $table->string('body');
            $table->timestamps();
            $table
                ->foreign('post_id') /*紐づけるカラム名*/
                ->references('id')  /*紐づけ先のカラム名*/
                ->on('posts')   /*紐づけ先のテーブル名*/
                ->onDelete('cascade');  /*削除の紐づけ設定*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
