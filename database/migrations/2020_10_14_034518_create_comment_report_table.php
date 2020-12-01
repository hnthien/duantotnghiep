<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_report', function (Blueprint $table) {
            $table->bigIncrements('comment_report_id');
            $table->integer('comment_id')->nullable();
            $table->integer('comment_report_user_id')->nullable();
            $table->integer('comment_report_status')->nullable();
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
        Schema::dropIfExists('comment_report');
    }
}
