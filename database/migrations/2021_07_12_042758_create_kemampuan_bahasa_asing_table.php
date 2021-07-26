<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKemampuanBahasaAsingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kemampuan_bahasa_asing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user');
            $table->string('bahasa');
            $table->boolean('read');
            $table->boolean('write');
            $table->boolean('speak');
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
        Schema::dropIfExists('kemampuan_bahasa_asing');
    }
}
