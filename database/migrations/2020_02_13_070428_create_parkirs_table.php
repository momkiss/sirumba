<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkir', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->unsignedBigInteger('pemohon_id')->index();
            $table->foreign('pemohon_id')
                    ->references('id')->on('pemohon')
                    ->onDelete('cascade');
            $table->string('kategori')->nullable();
            $table->string('jenis_bangunan')->nullable();
            $table->string('jenis_konstruksi')->nullable();
            $table->integer('ukuran')->nullable();
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
        Schema::dropIfExists('parkir');
    }
}
