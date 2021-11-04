<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsultasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->increments('id_konsultasi');
            $table->unsignedBigInteger('users_id')->length(20);
            $table->string('nama_pengaju')->length(100);
            $table->date('tanggal_pengajuan')->length(100);
            $table->string('sesi_konsultasi')->length(100);
            $table->string('keterangan')->length(100);
            $table->string('status_konsultasi')->length(100);
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
        Schema::dropIfExists('konsultasi');
    }
}
