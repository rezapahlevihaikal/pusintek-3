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
            $table->string('ip');
            $table->string('sistem_operasi');
            $table->integer('cpu');
            $table->integer('memory');
            $table->integer('disk');
            $table->string('cluster_host');
            $table->string('data_store');
            $table->string('no_tiket');
            $table->string('keterangan');
            $table->string('pic');
            $table->string('pic_opd');
            $table->string('no_bast');
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
