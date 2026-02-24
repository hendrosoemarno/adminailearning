<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

echo "--- ADDING sort_order COLUMN ---\n";

Schema::table('ai_siswa_tarif', function (Blueprint $table) {
    if (!Schema::hasColumn('ai_siswa_tarif', 'sort_order')) {
        $table->integer('sort_order')->default(0);
        echo "✅ Column sort_order added.\n";
    } else {
        echo "ℹ️ Column sort_order already exists.\n";
    }
});

echo "--- DONE ---\n";
