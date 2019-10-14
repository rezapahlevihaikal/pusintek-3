<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlokasiHostnamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alokasi_hostnames', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unit');
            $table->string('hostname');
            $table->string('description');
            $table->string('ip')->nullable();
            $table->string('sistem_operasi')->nullable();
            $table->integer('cpu')->nullable();
            $table->integer('memory')->nullable();
            $table->integer('disk')->nullable();
            $table->string('cluster_host')->nullable();
            $table->string('data_store')->nullable();
            $table->string('no_tiket')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('pic')->nullable();
            $table->string('pic_opd')->nullable();
            $table->string('no_bast')->nullable();
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
        Schema::dropIfExists('alokasi_hostnames');
    }
}
