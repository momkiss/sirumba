<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_perusahaan');
            $table->string('direktur')->nullable();
            $table->string('no_ktp')->nullable();
            $table->bigInteger('alamat_kecamatan')->unsigned();
            $table->bigInteger('alamat_kelurahan')->unsigned();
            $table->string('alamat_jalan')->nullable();
            $table->string('alamat_rt')->nullable();
            $table->string('telp')->nullable();
            $table->string('kode_pos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengembang');
    }
}
