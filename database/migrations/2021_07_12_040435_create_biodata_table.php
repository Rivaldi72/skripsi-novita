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
            $table->string('nama')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('jenis_kelamin', 1)->nullable();
            $table->string('status')->nullable();
            $table->string('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            // $table->integer('pengalaman_kerja')->nullable(); // sesuaikan dengan yg ada di mahad
            $table->string('jurusan_pendidikan')->nullable();
            $table->decimal('ipk')->nullable();
            // $table->string('wawancara')->nullable();
            // $table->string('psikotest')->nullable();
            // $table->integer('kemampuan_bahasa_asing')->nullable(); // buat table baru untuk menampun multiple record kemampuan bahasa asing
            $table->string('ktp')->nullable();
            $table->string('pas_poto')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('transkrip_nilai')->nullable();
            $table->string('portofolio')->nullable();
            $table->timestamps()->nullable();
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
