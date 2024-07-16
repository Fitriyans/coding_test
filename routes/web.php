<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SessionController;

//Halaman yang hanya bisa diakses jika tidak punya akun
Route::middleware('user')->group(function () {
    Route::get('/', [PostController::class, 'home'])->name('posts.home');

    Route::get('/login', [SessionController::class, 'index'])->name('login');
    Route::post('/login', [SessionController::class, 'login']);

    });

//Halaman yang hanya bisa diakses ketika sudah login
Route::middleware('auth')->group(function () {
    Route::get('/logout', [SessionController::class, 'logout']);

    Route::middleware('admin')->group(function () {
        Route::get('account', [AccountController::class, 'index']);
        Route::post('add-account', [AccountController::class, 'create']);
        Route::get('/account/edit/{username}', [AccountController::class, 'editAccount'])->name('account.editAccount');
        Route::put('/account/edit/{username}', [AccountController::class, 'updateAccount'])->name('account.updateAccount');
        Route::get('account/delete/{username}', [AccountController::class, 'deleteAccount']);

        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    });

    Route::middleware('author')->group(function () {
        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    });

});
