<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\Admin\CategoryController;
use App\Http\Controllers\Blog\Admin\PostController as AdminPostsController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('blog')->group(function () {
    Route::resource('posts', PostController::class)->names('blog.posts');
});

require __DIR__.'/auth.php';

//> Админка блога
Route::prefix('admin/blog')->group(function () {
    $methods = ['index', 'edit', 'store', 'update', 'create'];
    Route::resource('categories', CategoryController::class)
    ->only($methods)
    ->names('blog.admin.categories');
    Route::resource('posts', AdminPostsController::class)
        ->except(['show'])
        ->names('blog.admin.posts');
});
//<
