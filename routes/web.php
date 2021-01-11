<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard',[BooksController::class, 'index'])->name('dashboard');

    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
    Route::get('/category', [CategoriesController::class, 'add']);
    Route::post('/category', [CategoriesController::class, 'create']);
    Route::get('/category/{category}', [CategoriesController::class, 'edit']);
    Route::post('/category/{category}', [CategoriesController::class, 'update']);

    Route::get('/publishers', [PublishersController::class, 'index'])->name('publishers');
    Route::get('/publisher', [PublishersController::class, 'add']);
    Route::post('/publisher', [PublishersController::class, 'create']);
    Route::get('/publisher/{publisher}', [PublishersController::class, 'edit']);
    Route::post('/publisher/{publisher}', [PublishersController::class, 'update']);

    Route::get('/authors', [AuthorsController::class, 'index'])->name('authors');
    Route::get('/author', [AuthorsController::class, 'add']);
    Route::post('/author', [AuthorsController::class, 'create']);
    Route::get('/author/{author}', [AuthorsController::class, 'edit']);
    Route::post('/author/{author}', [AuthorsController::class, 'update']);

    Route::get('/books', [BooksController::class, 'index'])->name('books');
    Route::get('/book',[BooksController::class, 'add']);
    Route::post('/book',[BooksController::class, 'create']);
    Route::get('/book/{book}', [BooksController::class, 'edit']);
    Route::post('/book/{book}', [BooksController::class, 'update']);
});