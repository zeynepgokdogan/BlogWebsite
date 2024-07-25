<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('loginpage');
})->name('home');

// Route'lar için `auth` middleware'ını kullanarak kimlik doğrulaması yapılmasını sağlayın
Route::middleware('auth')->group(function () {
    // Profil ile ilgili route'lar
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin sayfaları
    Route::prefix('admin')->middleware('can:admin')->group(function () {
        Route::get('/homepage', [AdminController::class, 'homepage'])->name('admin.homepage');
    });
    // Post işlemleri
    Route::get('/post_page', [AdminController::class, 'post_page'])->name('admin.post_page');
    Route::post('/add_post', [AdminController::class, 'add_post'])->name('admin.add_post');
    Route::get('/show_post', [AdminController::class, 'show_post'])->name('admin.show_post');
    Route::get('/delete_post/{id}', [AdminController::class, 'delete_post'])->name('admin.delete_post');
    Route::get('/edit_post/{id}', [AdminController::class, 'edit_post'])->name('admin.edit_post');
    Route::post('/update_post/{id}', [AdminController::class, 'update_post'])->name('admin.update_post');


    // Kullanıcı sayfaları
    Route::prefix('user')->group(function () {
        Route::get('/homepage', [UserController::class, 'homepage'])->name('user.homepage');
        // Diğer kullanıcı sayfaları ve işlemleri ekleyin
    });
});

require __DIR__ . '/auth.php';
