<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKonsultasiDitolakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('konsultasi_ditolak', function (Blueprint $table) {
            $table->foreign('konsultasi_id')->references('id_konsultasi')->on('konsultasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('konsultasi_ditolak', function (Blueprint $table) {
            //
        });
    }
}
