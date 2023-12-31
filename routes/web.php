<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PenjaminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('pasien', PasienController::class);
Route::resource('dokter', DokterController::class);
Route::resource('penjamin', PenjaminController::class);
Route::resource('room', RoomController::class);
// Route::get('/pasien/export', 'PasienController@export')->name('pasien.export');
Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::get('/report/data/{first}/{last}', [ReportController::class, 'data'])->name('report.data');
Route::get('/report/data/pdf/{first}/{last}', [ReportController::class, 'exportPDF'])->name('report.export_pdf');

require __DIR__ . '/auth.php';
