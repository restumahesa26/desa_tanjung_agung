<?php

use App\Http\Controllers\BatasDesaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BumdesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanDesaController;
use App\Http\Controllers\PemerintahDesaController;
use App\Http\Controllers\PerdesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TentangDesaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/profil-desa', [HomeController::class, 'profil_desa'])->name('profil-desa');

Route::get('/berita-desa', [HomeController::class, 'berita'])->name('berita-desa');

Route::get('/berita-desa/{id}/detail', [HomeController::class, 'detailBerita'])->name('berita-desa.detail');

Route::get('/badan-usaha-milik-desa', [HomeController::class, 'bumdes'])->name('bumdes');

Route::get('/badan-usaha-milik-desa/{id}/detail', [HomeController::class, 'detailBumdes'])->name('bumdes.detail');

Route::get('/peraturan-desa', [HomeController::class, 'perdes'])->name('perdes');

Route::get('/peraturan-desa/{id}/detail', [HomeController::class, 'detailPerdes'])->name('perdes.detail');

Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri');

Route::get('/kontak-kami', [HomeController::class, 'kontak'])->name('kontak');

Route::post('/kontak-kami/store', [HomeController::class, 'store_kontak'])->name('kontak.store');

Route::get('/laporan-desa', [HomeController::class, 'laporan_desa'])->name('laporan-desa');

Route::get('/laporan-desa/{id}/detail', [HomeController::class, 'detailLaporan'])->name('laporan-desa.detail');

Route::prefix('dashboard')
    ->middleware(['auth'])
    ->group(function() {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::resource('berita', BeritaController::class);

        Route::resource('bumdes', BumdesController::class);

        Route::resource('perdes', PerdesController::class);

        Route::resource('tentang-desa', TentangDesaController::class);

        Route::resource('batas-desa', BatasDesaController::class);

        Route::resource('pemerintah-desa', PemerintahDesaController::class);

        Route::resource('galeri', GaleriController::class);

        Route::resource('laporan-desa', LaporanDesaController::class);

        Route::get('/profile/show', [ProfileController::class, 'edit'])->name('profile.edit');

        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });

Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

require __DIR__.'/auth.php';
