<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RatingController;

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
    return view('welcome');
});

Route::resource('books', BookController::class);
Route::resource('messages', MessageController::class);
Route::resource('ratings', RatingController::class);
Route::get('books/{id}/rate', [RatingController::class, 'rate'])->name('books.rate'); 
Route::get('books/{id}/comment', [RatingController::class, 'comment'])->name('books.comment');

Auth::routes();

// Redirigir a /books después de iniciar sesión
Route::get('/home', function () {
    return redirect('/books');
});
