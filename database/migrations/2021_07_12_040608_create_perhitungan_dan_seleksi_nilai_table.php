<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerhitunganDanSeleksiNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perhitungan_dan_seleksi_nilai', function (Blueprint $table) {
            $table->bigIncrements('id_seleksi');
            $table->bigInteger('id_user');
            $table->bigInteger('id_kriteria');
            $table->integer('nilai')->nullable();
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
        Schema::dropIfExists('perhitungan_dan_seleksi_nilai');
    }
}
