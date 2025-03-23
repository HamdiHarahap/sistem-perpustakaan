<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'registForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'userPage'])->name('admin.users');
    Route::get('/books', [AdminController::class, 'bookPage'])->name('admin.books');
    Route::get('/transactions', [AdminController::class, 'transPage'])->name('admin.trans');
    Route::get('/tambah', [AdminController::class, 'addBookPage'])->name('admin.add');
    Route::get('/edit/{id}', [AdminController::class, 'editBookPage'])->name('admin.edit');
    Route::get('/report', [AdminController::class, 'reportPage'])->name('admin.report');

    Route::put('/update-status/{id}', [TransactionController::class, 'updateStatus'])->name('admin.updateStatus');
    Route::post('/tambah', [BookController::class, 'store'])->name('book.post');
    Route::put('/edit/{id}', [BookController::class, 'update'])->name('book.put');
    Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('book.delete');
});

Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/books', [UserController::class, 'bookPage'])->name('user.books');
    Route::get('/transactions', [UserController::class, 'transPage'])->name('user.trans');
    Route::get('/history', [UserController::class, 'historyPage'])->name('user.history');
    Route::get('/change-password', [UserController::class, 'changePasswordPage'])->name('user.changePage');

    Route::post('/transactions', [TransactionController::class, 'store'])->name('user.add');
    Route::post('/change-password/{id}', [AuthController::class, 'changePassword'])->name('user.change');
});


