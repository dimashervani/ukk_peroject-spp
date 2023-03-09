<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\{PembayaranController,PetugasController,SiswaController,SppController,KelasController};
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
    return view('welcome');
});
  
Auth::routes();
  
// Route User    ===================================================
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Route Admin   ===================================================
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    route::resource('/pembayaran', PembayaranController::class);
    route::resource('/siswa', SiswaController::class);
    route::resource('/petugas', PetugasController::class);
    route::resource('/kelas', KelasController::class);
    route::resource('/spp', SppController::class);
});

// Route Petugas ===================================================
Route::middleware(['auth', 'user-access:petugas'])->group(function () {
    
    Route::get('/petugas/home', [HomeController::class, 'petugasHome'])->name('petugas.home');
});
Route::get('pembayaran/get-data/{nisn}/{berapa}',  [PembayaranController::class, 'getData']);
route::resource('/pembayaran', PembayaranController::class);
Route::get('generate-pdf/{nisn}', [PembayaranController::class, 'generatePDF'])->name('print.pdf');
Route::get('pembayaran-export', [PembayaranController::class, 'export'])->name('pembayaran.export');
Route::post('pembayaran-import', [PembayaranController::class, 'import'])->name('pembayaran.import');
