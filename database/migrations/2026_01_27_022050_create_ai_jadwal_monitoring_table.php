<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAiJadwalMonitoringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ai_jadwal_monitoring', function (Blueprint $table) {
            $table->id();
            $table->integer('id_admin');
            $table->integer('id_tentor');
            $table->integer('hari');
            $table->integer('waktu');
            $table->integer('id_siswa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ai_jadwal_monitoring');
    }
}
