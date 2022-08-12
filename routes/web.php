<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';



// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('users', [UserController::class , 'index'])->name('users.index')->middleware('auth');;

Route::get('users/create', [UserController::class , 'create'])->name('users.create')->middleware('auth');;

Route::post('users', [UserController::class , 'store'])->name('users.store')->middleware('auth');;

Route::get('users/{id}', [UserController::class , 'show'])->where('id', '[0-9]+')->name('users.show')->middleware('auth');;

Route::get('users/{id}/edit', [UserController::class , 'edit'])->name('users.edit')->middleware('auth');;

Route::put('users/{id}', [UserController::class , 'update'])->name('users.update')->middleware('auth');;

Route::delete('users/{id}', [UserController::class , 'destroy'])->name('users.destroy')->middleware('auth');;



Route::get('posts', [PostController::class , 'index'])->name('posts.index')->middleware('auth');;

Route::get('posts/create', [postController::class , 'create'])->name('posts.create')->middleware('auth');;

Route::post('posts', [PostController::class , 'store'])->name('posts.store')->middleware('auth');;

Route::get('posts/{id}', [PostController::class , 'show'])->where('id', '[0-9]+')->name('posts.show')->middleware('auth');;

Route::get('posts/{id}/edit', [PostController::class , 'edit'])->name('posts.edit')->middleware('auth');;

Route::put('posts/{id}', [PostController::class , 'update'])->name('posts.update')->middleware('auth');;

Route::delete('posts/{id}', [PostController::class , 'destroy'])->name('posts.destroy');

Route::get('/post/Deleted_Posts', [PostController::class , 'Deleted_Posts'])->name('post.Deleted_Posts');

Route::get('/post/restore/{id}', [PostController::class , 'restore'])->name('post.restore');

Route::get('/post/restoreAll', [PostController::class , 'restoreAll'])->name('post.restoreAll');

Route::get('/post/delete_final/{id}', [PostController::class , 'delete_final'])->name('post.delete_final');

Route::fallback(function () {
    return view('posts.index');
});
