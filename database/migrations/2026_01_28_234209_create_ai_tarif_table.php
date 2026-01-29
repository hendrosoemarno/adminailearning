<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAiTarifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ai_tarif', function (Blueprint $table) {
            $table->id();
            $table->enum('mapel', ['mat', 'bing', 'coding', ''])->default('');
            $table->string('kode', 20)->nullable();
            $table->integer('aplikasi')->nullable();
            $table->integer('manajemen')->nullable();
            $table->integer('tentor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ai_tarif');
    }
}
