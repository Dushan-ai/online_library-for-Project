<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class,'ShowLoginForm'])->name("login");
Route::get('/signup', [LoginController::class,'ShowSignupForm'])->name("signup");
Route::get('/logout', [LoginController::class,'LogOut'])->name("logout");
Route::get('/profile', [LoginController::class,'ShowProfile'])->name("profile");
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');

Route::post('/signup', [LoginController::class, 'SignUp'])->name('signup');
Route::post('/login', [LoginController::class, 'LogIn'])->name('login');

// Admin controller
Route::middleware('admin.auth')->group(function () {
    Route::get('../logout', [LoginController::class,'AdminLogOut'])->name("logout");
    Route::get('/admin/dashboard', [BookController::class, 'Adminindex'])->name('admin.dashboard');
    Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});

// User controller
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard');
    Route::post('/books/session/{id}', [BookController::class, 'toggleBorrow'])->name('books.session.toggle');
    Route::get('/books/session/check/{id}', [BookController::class, 'checkBorrow']);

    Route::get('/borrowed', [BookController::class, 'BorrowedBooks'])->name('borrowed');
    // Borrow a book (POST)
    Route::post('/borrow/{id}', [BookController::class, 'borrowBook'])->name('borrow.book');
    // Return a book (POST)
    Route::post('/return/{id}', [BookController::class, 'returnBook'])->name('return.book');
    Route::get('/borrowed', [BookController::class, 'SessionHistory'])->name('history');
});
