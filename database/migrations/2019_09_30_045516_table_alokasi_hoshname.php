<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableAlokasiHoshname extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('alokasi_hoshname', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unit');
            $table->string('description');
            $table->string('ip');
            $table->string('os');
            $table->string('cpu');
            $table->string('memory');
            $table->string('disk');
            $table->string('claster_host');
            $table->string('data_store');
            $table->string('no_tiket');
            $table->string('keterangan');
            $table->string('pic');
            $table->string('opd');
            $table->string('no_bast');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('alokasi_hoshname');
    }
}
