<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->increments('id_soal');
            $table->unsignedInteger('id_event');
            $table->text('soal');
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('d');
            $table->enum('kunci', ['a','b','c','d']);
            $table->timestamps();

            $table->foreign('id_event')->references('id_event')->on('events')
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
        Schema::dropIfExists('soals');
    }
}
