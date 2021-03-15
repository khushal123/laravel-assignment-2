<?php

use App\Http\Controllers\Articles;
use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('articles', [Articles::class, 'index'])->middleware(['auth'])->name("articles");

Route::get('articles/create', [Articles::class, 'create'])->middleware(['auth'])->name("create_article");

Route::post('articles', [Articles::class, 'store'])->middleware(['auth'])->name("store_article");

Route::get('articles/{id}', [Articles::class, 'show'])->middleware(['auth'])->name("show_article");

Route::put('articles/{id}', [Articles::class, 'update'])->middleware(["auth"])->name("edit_article");

require __DIR__ . '/auth.php';
