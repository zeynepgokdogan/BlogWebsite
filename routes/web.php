<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('loginpage');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin pages
Route::prefix('admin')->middleware('can:admin')->group(function () {
    Route::get('/homepage', [AdminController::class, 'homepage'])->name('admin.homepage');
});


// Post operations
Route::get('/post_page', [AdminController::class, 'post_page'])->name('post_page');
Route::post('/add_post', [AdminController::class, 'add_post'])->name('add_post');
Route::get('/show_post', [AdminController::class, 'show_post'])->name('show_post');
Route::get('/delete_post/{id}', [AdminController::class, 'delete_post'])->name('delete_post');
Route::get('/edit_post/{id}', [AdminController::class, 'edit_post'])->name('edit_post');
Route::post('/update_post/{id}', [AdminController::class, 'update_post'])->name('update_post');

// User pages
Route::prefix('user')->group(function () {
    Route::get('/homepage', [UserController::class, 'homepage'])->name('user.homepage');
    Route::get('/blogpost', [UserController::class, 'blogpost'])->name('user.blogpost');
    Route::get('/addpost', [UserController::class, 'addpost'])->name('user.addpost');
    Route::post('/addpost', [UserController::class, 'user_post'])->name('user_post');
    Route::get('/mypost', [UserController::class, 'my_post'])->name('my_post');
    Route::get('/delete/{id}', [UserController::class, 'mypost_delete'])->name('mypost_delete');
    Route::get('/edit/{id}', [UserController::class, 'mypost_edit'])->name('mypost_edit');
    Route::post('/update/{id}', [UserController::class, 'mypost_update'])->name('mypost_update');
    Route::get('/post_details/{id}', [UserController::class, 'post_details'])->name('post_details');
});
