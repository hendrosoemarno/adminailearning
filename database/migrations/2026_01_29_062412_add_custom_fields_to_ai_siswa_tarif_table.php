<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomFieldsToAiSiswaTarifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ai_siswa_tarif', function (Blueprint $table) {
            $table->date('tanggal_masuk')->nullable()->after('id_tarif');
            $table->integer('custom_total_meet')->nullable()->after('tanggal_masuk');
            $table->text('keterangan')->nullable()->after('custom_total_meet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ai_siswa_tarif', function (Blueprint $table) {
            $table->dropColumn(['tanggal_masuk', 'custom_total_meet', 'keterangan']);
        });
    }
}
