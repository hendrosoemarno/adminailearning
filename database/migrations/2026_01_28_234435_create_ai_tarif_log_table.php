<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAiTarifLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ai_tarif_log', function (Blueprint $table) {
            $table->id();
            $table->enum('mapel', ['mat', 'bing', 'coding', ''])->default('');
            $table->string('kode', 20)->nullable();
            $table->integer('aplikasi')->nullable();
            $table->integer('manajemen')->nullable();
            $table->integer('tentor')->nullable();
            $table->integer('tgl_ubah')->nullable();
            $table->enum('tipe_ubah', ['insert', 'update', 'delete', ''])->default('');
            $table->integer('id_useradmin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ai_tarif_log');
    }
}
