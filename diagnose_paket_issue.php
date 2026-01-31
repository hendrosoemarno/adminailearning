<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== Checking ai_siswa_tarif records with NULL id_tarif ===\n";
$nullTarif = DB::table('ai_siswa_tarif')
    ->whereNull('id_tarif')
    ->get();
echo "Found " . $nullTarif->count() . " records with NULL id_tarif\n";
if ($nullTarif->count() > 0) {
    print_r($nullTarif->toArray());
}

echo "\n=== Checking ai_siswa_tarif records with empty id_tarif ===\n";
$emptyTarif = DB::table('ai_siswa_tarif')
    ->where('id_tarif', '')
    ->orWhere('id_tarif', 0)
    ->get();
echo "Found " . $emptyTarif->count() . " records with empty/zero id_tarif\n";
if ($emptyTarif->count() > 0) {
    print_r($emptyTarif->toArray());
}

echo "\n=== Checking orphaned records (siswa not in ai_tentor_siswa) ===\n";
$orphaned = DB::table('ai_siswa_tarif as st')
    ->leftJoin('ai_tentor_siswa as ts', 'st.id_siswa', '=', 'ts.id_siswa')
    ->whereNull('ts.id_siswa')
    ->select('st.*')
    ->get();
echo "Found " . $orphaned->count() . " orphaned records\n";
if ($orphaned->count() > 0) {
    print_r($orphaned->toArray());
}

echo "\n=== Sample of valid records ===\n";
$valid = DB::table('ai_siswa_tarif')
    ->whereNotNull('id_tarif')
    ->where('id_tarif', '>', 0)
    ->limit(5)
    ->get();
print_r($valid->toArray());
