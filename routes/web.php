<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/book', [BookController::class, 'index']);
Route::get('/book/{book}/edit', [BookController::class, 'edit']);
Route::get('/book/create', [BookController::class, 'create']);
Route::PUT('/book', [BookController::class, 'store']);
Route::PUT('/book/{book}', [BookController::class, 'update']);
Route::delete('/book/{book}', [BookController::class, 'destroy']);