<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\AdminPost;
use App\Http\Livewire\Post;
use App\Http\Livewire\PostCreate;
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

//Route::get('/', [PostController::class, 'index']);
Route::view('/', 'home');
Route::get('{slug}', Post::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('admin/posts', AdminPost::class);
Route::get('admin/pages', [PageController::class, 'index'])->name('admin.pages');
Route::get('admin/tags', [PageController::class, 'index'])->name('admin.pages');
