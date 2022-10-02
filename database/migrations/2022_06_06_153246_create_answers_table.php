<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id_answer');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_event');
            $table->unsignedInteger('id_soal');
            $table->enum('jawaban', ['a','b','c','d']);
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('id_user')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_event')->references('id_event')->on('events')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_soal')->references('id_soal')->on('soals')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
