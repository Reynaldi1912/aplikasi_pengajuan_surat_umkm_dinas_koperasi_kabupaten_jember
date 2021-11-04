<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiUsahaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_usaha', function (Blueprint $table) {
            $table->increments('id_nilai_usaha')->length(11);
            $table->string('modal_usaha')->length(100);
            $table->string('asset')->length(100);
            $table->string('omset')->length(100);
            $table->string('keuntungan')->length(100);
            $table->integer('jumlah_tenaga_kerja')->length(100);

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
        Schema::dropIfExists('nilai_usaha');
    }
}
