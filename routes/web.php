<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\VarDumper;

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
Route::get('/', [PostController::class, 'index'])->name('posts');

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/about', function () {
    return view('/static/about');
})->name('about');

Route::get('/books', function () {
    return 'list of books';
})->name('books');

Route::get('/contacts', function () {
    return 'contacts page';
})->name('contacts');

Route::get('{slug}', [PostController::class, 'view'])->name('posts.view');

Route::get('/tag/{slug}', [\App\Http\Controllers\TagController::class, 'view'])->name('tag.view');

Route::prefix('admin')->group(function () {
    Route::get('posts', [\App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.posts.index');
    Route::get('tags', [TagController::class, 'index'])->name('admin.tags.index');
    Route::get('books', [BookController::class, 'index'])->name('admin.books.index');
});

Route::get('/clear-cache', function () {
    $configCache = Artisan::call('config:cache');
    $clearCache = Artisan::call('cache:clear');
    VarDumper::dump([
        $configCache,
        $clearCache,
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
