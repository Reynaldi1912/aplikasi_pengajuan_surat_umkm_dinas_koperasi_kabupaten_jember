<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->increments('id_pengajuan')->length(11);
            $table->unsignedBigInteger('users_id')->length(20);
            $table->unsignedInteger('data_diri_id')->length(11);
            $table->unsignedInteger('usaha_id')->length(11);
            $table->unsignedInteger('berkas_id')->length(11);
            $table->string('status')->length(50);
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
        Schema::dropIfExists('pengajuan');
    }
}
