<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHadiahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hadiahs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('hid')->unique();          // Voucher ID
            $table->string('name')->nullable();         // Voucher Name
            $table->string('description')->nullable();  // Voucher Description
            $table->integer('price')->nullable();   
            $table->integer('stok')->nullable();      // Voucher Price
            $table->string('status')->nullable();         // Voucher status
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hadiahs');
    }
}
