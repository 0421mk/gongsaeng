<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->increments('pollId');
            $table->string('userName', 255);
            $table->string('userNumber', 255);
            $table->string('userEmail', 255);
            $table->longText('answerValue');
            $table->timestamps();

            $table->foreign('pollId')->references('pollTypeId')->on('poll_types')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polls');
    }
}
