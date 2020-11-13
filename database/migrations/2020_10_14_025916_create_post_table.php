<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->integer('user_id')->nullable();
            $table->integer('censor_id')->nullable();
            $table->string('category_id')->nullable();
            $table->integer('post_status')->nullable();
            $table->integer('censor_status')->nullable();
            $table->string('post_title')->nullable();
            $table->string('post_slug')->nullable();
            $table->string('post_tag')->nullable();
            $table->string('post_intro',1000)->nullable();
            $table->string('post_image')->nullable();
            $table->longText('post_content')->nullable();
            $table->integer('post_view')->nullable();
            $table->string('article_notes',2000)->nullable();
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
        Schema::dropIfExists('post');
    }
}
