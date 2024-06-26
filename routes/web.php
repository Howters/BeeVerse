<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UkmController;
use App\Models\Announcement;
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

Route::middleware('auth', 'is_admin')->group(function () {
    Route::get('/admin-panel', [UkmController::class, 'index'])->name('admin.panel');
    Route::post('/add-ukm', [UkmController::class, 'create'])->name('add.ukm');
    Route::post('/add-tag', [TagController::class, 'create'])->name('add.tag');
    Route::post('/add-announcement', [AnnouncementController::class, 'create'])->name('add.announcement');
    Route::post('/add-product', [ProductController::class, 'create'])->name('add.product');
    Route::get('/edit-ukm/{id}', [UkmController::class, 'edit'])->name('edit.ukm');
    Route::post('/verify-order', [OrderController::class, 'verify'])->name('verify.order');
    Route::patch('/update-ukm/{id}', [UkmController::class, 'update'])->name('update.ukm');
    Route::delete('/delete-ukm/{id}', [UkmController::class, 'destroy'])->name('delete.ukm');
});

Route::get('/', [UkmController::class, 'homepage'])->name('get.movie.homepage');
Route::get('login', [AuthenticatedSessionController::class, 'create'])
->name('login');
Route::get('register', [RegisteredUserController::class, 'create'])
->name('register');
Route::get('/announcements', [AnnouncementController::class, 'index'])->name('get.announcements.homepage');
Route::get('/announcement/{id}', [AnnouncementController::class, 'detail'])->name('announcement.detail');
Route::get('/products', [ProductController::class, 'index'])->name('get.products.homepage');
Route::get('/order-list', [OrderController::class, 'index'])->name('get.order');
Route::get('/{name}', [UkmController::class, 'detail'])->name('ukm.detail');

Route::post('/add-order', [OrderController::class, 'create'])->name('add.order');


Route::get('/list-theater', function () {
    return view('list-theater');
})->name('list');



Route::get('/products-detail', function () {
    return view('products-detail');
})->name('products-detail');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



Route::middleware('auth')->group(function () {
    Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');
});



require __DIR__.'/auth.php';
