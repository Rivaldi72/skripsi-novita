<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->bigIncrements('id_biodata');
            $table->bigInteger('id_user');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('jenis_kelamin', 1);
            $table->string('status');
            $table->string('alamat');
            $table->string('email');
            $table->string('no_hp');
            $table->string('pendidikan_terakhir');
            // $table->integer('pengalaman_kerja'); // sesuaikan dengan yg ada di mahad
            $table->string('jurusan_pendidikan');
            $table->decimal('ipk');
            // $table->string('wawancara');
            // $table->string('psikotest');
            // $table->integer('kemampuan_bahasa_asing'); // buat table baru untuk menampun multiple record kemampuan bahasa asing
            $table->string('ktp');
            $table->string('pas_poto');
            $table->string('ijazah');
            $table->string('transkrip_nilai');
            $table->string('portofolio');
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
        Schema::dropIfExists('biodata');
    }
}
