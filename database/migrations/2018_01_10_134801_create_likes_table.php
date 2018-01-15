<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('image_id')->unsigned();
            $table->foreign('image_id', 'image_liked')->references('id')->on('images')->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id', 'like_author')->references('id')->on('users')->onDelete('cascade');

            $table->unique(['image_id', 'user_id'], 'unique_like');

            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
