<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateErrorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('error', function (Blueprint $table) {
            $table->bigIncrements('error_id');
            $table->integer('user_id')->nullable();
            $table->string('error_url')->nullable();
            $table->string('error_content',5000)->nullable();
            $table->integer('error_status')->nullable();
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
        Schema::dropIfExists('error');
    }
}
