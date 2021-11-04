<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsahaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usaha', function (Blueprint $table) {
            $table->foreign('nilai_usaha_id')->references('id_nilai_usaha')->on('nilai_usaha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usaha', function (Blueprint $table) {
            //
        });
    }
}
