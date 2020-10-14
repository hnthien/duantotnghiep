<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyToCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_to_comment', function (Blueprint $table) {
            $table->bigIncrements('reply_to_comment_id');
            $table->integer('comment_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('post_id')->nullable();
            $table->string('reply_to_comment_content',1000)->nullable();
            $table->integer('reply_to_comment_status')->nullable();
            $table->integer('reply_to_comment_dislike')->nullable();
            $table->integer('reply_to_comment_like')->nullable();
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
        Schema::dropIfExists('reply_to_comment');
    }
}
