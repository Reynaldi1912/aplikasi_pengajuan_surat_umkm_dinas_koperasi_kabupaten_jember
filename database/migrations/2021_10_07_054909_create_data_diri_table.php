<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDiriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_diri', function (Blueprint $table) {
            $table->increments('id_data_diri')->length(11);
            $table->string('nama_pengaju')->length(100);
            $table->date('tanggal_pengajuan');
            $table->string('kelurahan_desa')->length(100);
            $table->string('dusun_jalan')->length(100);
            $table->string('kecamatan')->length(100);
            $table->string('no_telp')->length(100);
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
        Schema::dropIfExists('data_diri');
    }
}
