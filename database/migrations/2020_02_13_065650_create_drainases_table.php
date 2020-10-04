<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrainasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drainase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->unsignedBigInteger('pemohon_id')->index();
            $table->foreign('pemohon_id')
                    ->references('id')->on('pemohon')
                    ->onDelete('cascade');
            $table->string('kategori')->nullable();
            $table->integer('panjang')->nullable();
            $table->integer('lebar')->nullable();
            $table->integer('luas')->nullable();
            $table->bigInteger('jenis_konstruksi_id')->nullable();
            $table->text('keterangan')->nullable();
            $table->enum('tersedia',['Ada','Tidak'])->nullable();
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
        Schema::dropIfExists('drainase');
    }
}
