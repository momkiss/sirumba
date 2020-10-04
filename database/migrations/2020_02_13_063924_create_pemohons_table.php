<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemohonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemohon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->date('tanggal');
            $table->year('tahun');
            $table->string('nama_lengkap_pengembang');
            $table->string('alamat_kecamatan_pengembang');
            $table->string('alamat_kelurahan_pengembang');
            $table->string('alamat_rt_pengembang')->nullable();
            $table->text('alamat_jalan_pengembang');
            $table->string('alamat_kodepos_pengembang');
            $table->string('nomor_ktp');
            $table->string('nomor_surat_permohonan');
            $table->date('tanggal_surat_permohonan');
            $table->string('pekerjaan');
            $table->string('jabatan')->nullable();
            $table->string('telp')->nullable();
            $table->string('nama_perumahan');
            $table->string('alamat_kecamatan_perumahan');
            $table->string('alamat_kelurahan_perumahan');
            $table->string('alamat_rt_perumahan')->nullable();
            $table->text('alamat_jalan_perumahan');
            $table->string('alamat_kodepos_perumahan');
            $table->bigInteger('luas_lahan');
            $table->integer('luas_prasarana')->nullable();
            $table->integer('luas_sarana')->nullable();
            $table->integer('luas_rth')->nullable();
            $table->integer('verifikator')->nullable();
            $table->string('jenis_perumahan')->nullable();
            $table->integer('status')->default(0);
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('pemohon');
    }
}
