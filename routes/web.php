<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BukuController;
use App\Http\Controllers\LatihansoalController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;

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
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/users', UserController::class);
    Route::resource('/buku', BukuController::class);
    Route::get('/latihan_soal', [LatihansoalController::class, 'index']);
    Route::post('/hapusgambar', [PostController::class, 'hapusGambar']);
    Route::post('/req_soal', [LatihansoalController::class, 'latsol']);
    Route::resource('/pegawai', PegawaiController::class);
    Route::resource('/surats', SuratController::class);

Route::resource('/artikel', PostController::class);


});

Route::get('/postingan', [PostController::class, 'listArtikel'])->name('list-artikel');

Route::get('/about', function(){return view('about');});

Route::get('/perpustakaan', [BukuController::class, 'tampilan_user']);

Route::get('/list_surat', function () {
    return view('tampilan_user.surat');
});

Route::get('/list_pegawai', [PegawaiController::class, 'tampilan_user']);


require __DIR__.'/auth.php';
