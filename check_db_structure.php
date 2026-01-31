<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$columns = DB::select('DESCRIBE ai_siswa_tarif');
print_r($columns);

$sample = DB::table('ai_siswa_tarif')->limit(5)->get();
print_r($sample);
