<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAiSiswaTarifTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ai_siswa_tarif', function (Blueprint $table) {
            $table->id();
            $table->integer('id_siswa');
            $table->integer('id_tarif');
        });

        Schema::create('ai_siswa_tarif_log', function (Blueprint $table) {
            $table->id();
            $table->integer('id_siswa');
            $table->integer('id_tarif');
            $table->integer('id_useradmin');
            $table->integer('tgl_update')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ai_siswa_tarif');
        Schema::dropIfExists('ai_siswa_tarif_log');
    }
}
