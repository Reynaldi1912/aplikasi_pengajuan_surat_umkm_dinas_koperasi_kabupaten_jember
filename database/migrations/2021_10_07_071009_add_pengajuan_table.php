<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('data_diri_id')->references('id_data_diri')->on('data_diri');
            $table->foreign('usaha_id')->references('id_usaha')->on('usaha');
            $table->foreign('berkas_id')->references('id_berkas')->on('berkas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengajuan', function (Blueprint $table) {
            //
        });
    }
}
