<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\User;

// Default path
Route::get('/', [UserController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    Route::view('/admin','admin')->name('admin');
});

/**
 * Added routes
 */

// Shows every possible user
Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');

// Shows current user web page
Route::get('/users/{id}', [UserController::class, 'show'])
    ->name('users.show');


// Create new post
// Route::get('/users/create-post', [UserController::class, 'create'])
//     ->name('user.create');

// Route::post('/users', [UserController::class, 'store'])
//     ->name('user.store');

// Route::post('/users', [PostController::class, 'store'])
//     ->name('post.store');


// Post/Update/Delete
Route::post('/users', [CommentController::class, 'store'])
    ->name('comment.store');

Route::delete('/users/{id}', [CommentController::class, 'destroy'])
    ->name('comment.destroy');

require __DIR__.'/auth.php';
