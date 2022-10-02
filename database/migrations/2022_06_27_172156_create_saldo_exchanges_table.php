<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo_exchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('tid')->unique();
            $table->integer('id_user')->unsigned();
            $table->bigInteger('saldo')->unsigned(); // Saldo Masuk
            $table->enum('jenis', ['masuk', 'keluar']); // Saldo Keluar

            $table->foreign('id_user')->references('id')->on('users')
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
        Schema::dropIfExists('saldo_exchanges');
    }
}
