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

// Student Registration (public)
Route::get('/register', [\App\Http\Controllers\RegistrationController::class, 'showForm'])->name('register');
Route::post('/register', [\App\Http\Controllers\RegistrationController::class, 'register'])->name('register.submit');
Route::post('/register/check-username', [\App\Http\Controllers\RegistrationController::class, 'checkUsername'])->name('register.check-username');
Route::post('/register/preview-password', [\App\Http\Controllers\RegistrationController::class, 'previewPassword'])->name('register.preview-password');
Route::get('/register/success', [\App\Http\Controllers\RegistrationController::class, 'success'])->name('register.success');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\UserController::class, 'index'])->name('dashboard');
    Route::get('/user/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::get('/quiz-attempts', [\App\Http\Controllers\LoginController::class, 'dashboard'])->name('quiz-attempts');
    Route::resource('tentors', \App\Http\Controllers\TentorController::class);
    Route::resource('useradmins', \App\Http\Controllers\AdminUserController::class);

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

    // Monitoring Management
    Route::get('/monitoring', [\App\Http\Controllers\MonitoringController::class, 'index'])->name('monitoring.index');
    Route::get('/monitoring/edit', [\App\Http\Controllers\MonitoringController::class, 'edit'])->name('monitoring.edit');
    Route::post('/monitoring/update', [\App\Http\Controllers\MonitoringController::class, 'update'])->name('monitoring.update');

    // Presensi Monitoring
    Route::get('/presensi-monitoring', [\App\Http\Controllers\PresensiMonitoringController::class, 'index'])->name('presensi-monitoring.index');
    Route::get('/presensi-monitoring/export', [\App\Http\Controllers\PresensiMonitoringController::class, 'export'])->name('presensi-monitoring.export');
    Route::get('/presensi-monitoring/create', [\App\Http\Controllers\PresensiMonitoringController::class, 'create'])->name('presensi-monitoring.create');
    Route::post('/presensi-monitoring', [\App\Http\Controllers\PresensiMonitoringController::class, 'store'])->name('presensi-monitoring.store');
    Route::get('/presensi-monitoring/{id}/edit', [\App\Http\Controllers\PresensiMonitoringController::class, 'edit'])->name('presensi-monitoring.edit');
    Route::put('/presensi-monitoring/{id}', [\App\Http\Controllers\PresensiMonitoringController::class, 'update'])->name('presensi-monitoring.update');
    Route::delete('/presensi-monitoring/{id}', [\App\Http\Controllers\PresensiMonitoringController::class, 'destroy'])->name('presensi-monitoring.destroy');

    // Biaya Management
    Route::get('/biaya', [\App\Http\Controllers\BiayaController::class, 'index'])->name('biaya.index');
    Route::get('/biaya/summary', [\App\Http\Controllers\BiayaController::class, 'summary'])->name('biaya.summary');
    Route::get('/biaya/summary/export', [\App\Http\Controllers\BiayaController::class, 'summaryExport'])->name('biaya.summary.export');
    Route::get('/biaya/billing', [\App\Http\Controllers\BiayaController::class, 'billing'])->name('biaya.billing');
    Route::get('/biaya/student-list', [\App\Http\Controllers\BiayaController::class, 'studentList'])->name('biaya.student-list');
    Route::get('/biaya/active-student-list', [\App\Http\Controllers\BiayaController::class, 'activeStudentList'])->name('biaya.active-student-list');
    Route::get('/biaya/active-student-list/export', [\App\Http\Controllers\BiayaController::class, 'activeStudentListExport'])->name('biaya.active-student-list.export');
    Route::get('/biaya/student-list/export', [\App\Http\Controllers\BiayaController::class, 'studentListExport'])->name('biaya.student-list.export');
    Route::post('/biaya/toggle-student-mark', [\App\Http\Controllers\BiayaController::class, 'toggleStudentMark'])->name('biaya.toggle-student-mark');
    Route::post('/biaya/reset-student-marks', [\App\Http\Controllers\BiayaController::class, 'resetStudentMarks'])->name('biaya.reset-student-marks');
    Route::get('/biaya/{tentor}', [\App\Http\Controllers\BiayaController::class, 'show'])->name('biaya.show');
    Route::get('/biaya/{tentor}/salary', [\App\Http\Controllers\BiayaController::class, 'salary'])->name('biaya.salary');
    Route::get('/biaya/{tentor}/salary/export', [\App\Http\Controllers\BiayaController::class, 'salaryExport'])->name('biaya.salary.export');
    Route::post('/biaya/update-paket', [\App\Http\Controllers\BiayaController::class, 'updatePaket'])->name('biaya.update-paket');
    Route::post('/biaya/update-custom', [\App\Http\Controllers\BiayaController::class, 'updateCustomData'])->name('biaya.update-custom');
    Route::post('/biaya/toggle-salary', [\App\Http\Controllers\BiayaController::class, 'toggleSalaryStatus'])->name('biaya.toggle-salary');
    Route::post('/biaya/update-order', [\App\Http\Controllers\BiayaController::class, 'updateOrder'])->name('biaya.update-order');
    Route::post('/biaya/bulk-update-meet', [\App\Http\Controllers\BiayaController::class, 'bulkUpdateMeet'])->name('biaya.bulk-update-meet');
    Route::post('/biaya/save-option', [\App\Http\Controllers\BiayaController::class, 'saveOption'])->name('biaya.save-option');
    Route::post('/biaya/toggle-wa-status', [\App\Http\Controllers\BiayaController::class, 'toggleWaStatus'])->name('biaya.toggle-wa-status');

    // Tarif Management
    Route::get('/tarifs/history', [\App\Http\Controllers\TarifController::class, 'history'])->name('tarifs.history');
    Route::resource('tarifs', \App\Http\Controllers\TarifController::class);
});

// Tentor Portal Routes
Route::prefix('portal')->group(function () {
    Route::get('/', function () {
        return redirect()->route('tentor.login');
    });
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

        // Jadwal Tentor
        Route::get('/schedule', [\App\Http\Controllers\Tentor\ScheduleController::class, 'index'])->name('tentor.schedule.index');
        Route::get('/schedule/edit', [\App\Http\Controllers\Tentor\ScheduleController::class, 'edit'])->name('tentor.schedule.edit');
        Route::put('/schedule', [\App\Http\Controllers\Tentor\ScheduleController::class, 'update'])->name('tentor.schedule.update');
    });
});
