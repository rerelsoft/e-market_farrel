<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;


route::get('/', [HomeController::class, 'index']);
route::get('profile', [HomeController::class, 'profile']);
route::get('contact', [HomeController::class, 'contact']);
route::get('faq', [HomeController::class, 'faq']);
route::resource('produk', ProdukController::class);
route::resource('barang', BarangController::class);
route::resource('pemasok', PemasokController::class);
route::resource('user', UsersController::class);
route::resource('pelanggan', PelangganController::class);
route::resource('pembelian', PembelianController::class);
// export excel
route::get('download/produk', [ProdukController::class, 'exportData'])->name('export_produk');
// import excel
route::post('produk/import', [ProdukController::class, 'importData'])->name('import');
// pdf
route::get('generate/produk', [ProdukController::class, 'downloadPdf'])->name('exportPdf_produk');
// route::get('/blog', [DashboardController::class, 'blog']);
