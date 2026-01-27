<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::resource('tentors', \App\Http\Controllers\TentorController::class);
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    // Tentor-Siswa Management
    Route::get('/active-tentors', [\App\Http\Controllers\TentorSiswaController::class, 'index'])->name('tentor-siswa.active');
    Route::get('/active-tentors/{tentor}/students', [\App\Http\Controllers\TentorSiswaController::class, 'manageStudents'])->name('tentor-siswa.manage');
    Route::post('/active-tentors/{tentor}/add-student', [\App\Http\Controllers\TentorSiswaController::class, 'addStudent'])->name('tentor-siswa.add');
    Route::post('/active-tentors/{tentor}/remove-student', [\App\Http\Controllers\TentorSiswaController::class, 'removeStudent'])->name('tentor-siswa.remove');
    Route::get('/active-tentors/{tentor}/schedule', [\App\Http\Controllers\TentorSiswaController::class, 'showSchedule'])->name('tentor-siswa.schedule');
    Route::get('/active-tentors/{tentor}/schedule/edit', [\App\Http\Controllers\TentorSiswaController::class, 'editSchedule'])->name('tentor-siswa.schedule.edit');
    Route::put('/active-tentors/{tentor}/schedule', [\App\Http\Controllers\TentorSiswaController::class, 'updateSchedule'])->name('tentor-siswa.schedule.update');
    Route::get('/master-schedule', [\App\Http\Controllers\TentorSiswaController::class, 'allSchedules'])->name('tentor-siswa.all-schedules');
    Route::get('/available-schedule', [\App\Http\Controllers\TentorSiswaController::class, 'availableSchedules'])->name('tentor-siswa.available');

    // Presensi Management
    Route::get('/presensi', [\App\Http\Controllers\PresensiController::class, 'index'])->name('presensi.index');
    Route::delete('/presensi/{id}', [\App\Http\Controllers\PresensiController::class, 'destroy'])->name('presensi.destroy');
    Route::post('/presensi/bulk-delete', [\App\Http\Controllers\PresensiController::class, 'bulkDelete'])->name('presensi.bulk-delete');
});

// Tentor Portal Routes
Route::prefix('portal')->group(function () {
    Route::get('/register', [\App\Http\Controllers\TentorAuthController::class, 'showRegistrationForm'])->name('tentor.register');
    Route::post('/register', [\App\Http\Controllers\TentorAuthController::class, 'register']);
    Route::get('/login', [\App\Http\Controllers\TentorAuthController::class, 'showLoginForm'])->name('tentor.login');
    Route::post('/login', [\App\Http\Controllers\TentorAuthController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\TentorAuthController::class, 'logout'])->name('tentor.logout');

    Route::middleware('auth:tentor')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\TentorAuthController::class, 'dashboard'])->name('tentor.dashboard');
        Route::get('/profile', [\App\Http\Controllers\TentorAuthController::class, 'editProfile'])->name('tentor.profile.edit');
        Route::put('/profile', [\App\Http\Controllers\TentorAuthController::class, 'updateProfile'])->name('tentor.profile.update');

        // Presensi Tentor
        Route::resource('presensi', \App\Http\Controllers\Tentor\PresensiController::class, ['as' => 'tentor']);
    });
});
