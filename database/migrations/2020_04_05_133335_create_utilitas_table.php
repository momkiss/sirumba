<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilitas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
             $table->unsignedBigInteger('pemohon_id')->index();
            $table->foreign('pemohon_id')
                    ->references('id')->on('pemohon')
                    ->onDelete('cascade');
            $table->string('penerangan_jalan')->nullable();
            $table->string('jaringan_air_bersih')->nullable();
            $table->string('pemadam_kebakaran')->nullable();
            $table->string('jaringan_listrik')->nullable();
            $table->string('jaringan_telepon')->nullable();
            $table->string('jaringan_gas')->nullable();
            $table->string('jaringan_transportasi')->nullable();
            $table->string('sarana_penerangan_jasa_umum')->nullable();
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
        Schema::dropIfExists('utilitas');
    }
}
