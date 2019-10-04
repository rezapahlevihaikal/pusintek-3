<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlokasiHostnameBast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alokasi_hostname_bast', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bast_id')->unsigned();
            $table->integer('alokasi_hostname_id')->unsigned();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alokasi_hostname_bast');
    }
}
