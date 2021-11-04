<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsahaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usaha', function (Blueprint $table) {
            $table->increments('id_usaha')->length(11);
            $table->unsignedInteger('nilai_usaha_id')->length(11);
            $table->string('nama_usaha')->length(100);
            $table->string('jenis_usaha')->length(100);
            $table->string('kegiatan_usaha')->length(100);
            $table->date('tanggal_mulai_usaha');
            $table->boolean('pinjaman_dana');
            $table->boolean('ikut_pembinaan_usaha');

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
        Schema::dropIfExists('usaha');
    }
}
