<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAiPresensiMonitoringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ai__presensi_monitoring', function (Blueprint $table) {
            $table->id();
            $table->integer('id_useradmin')->nullable();
            $table->integer('id_tentor')->nullable();
            $table->integer('id_siswa')->nullable();
            $table->integer('tgl_input')->nullable();
            $table->integer('tgl_monitoring')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ai__presensi_monitoring');
    }
}
