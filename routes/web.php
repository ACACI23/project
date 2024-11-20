<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PinjamBarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\StokController;

use App\Models\category;

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
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/supply', function () {
    return view('supply', [
        "title" => "supply",
    ]);
});

// Rute untuk Supplier
Route::resource('/supplier', SupplierController::class);

// Rute untuk Stok
Route::resource('/stok', StokController::class);

// Rute untuk Barang
Route::resource('/barang', BarangController::class);

// Rute untuk Barang Pinjam
Route::resource('/pinjam', PinjamBarangController::class);

// Rute untuk Barang Masuk
Route::resource('/barang-masuk', BarangMasukController::class);

// Rute untuk Barang Keluar
Route::resource('/barang-keluar', BarangKeluarController::class);

// Rute untuk Post
Route::get('/posts', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);

// Rute untuk Categories
Route::get('/categories', function() {
    return view('categories', [
        'title' => 'All Posts',
        'posts' => Category::all()
    ]);
});

// Rute untuk Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Rute untuk Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Rute untuk Dashboard Post dan Categories
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('is_admin');
