<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHadiahHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hadiah_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('qr_code'); 
            $table->unsignedInteger('id_user');
            $table->string('hid');                          // Hadiah ID
            $table->string('hdata')->unique();              // Data unik di voucher untuk verifikasi
            $table->boolean('verified')->default(false);    // Status voucher apakah sudah dipakai?
            
            $table->foreign('id_user')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('hid')->references('hid')->on('hadiahs')
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
        Schema::dropIfExists('voucher_histories');
    }
}