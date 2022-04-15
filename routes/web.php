<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendController;
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

// Show followers
Route::get('followers/{id}', [UserController::class, 'followers'])
    ->name('users.followers');

// Show following profiles
Route::get('following/{id}', [UserController::class, 'following'])
    ->name('users.following');

// AJAX test
Route::get('comments', [CommentController::class, 'page']);

// Create new post
// Route::get('/users/create-post', [UserController::class, 'create'])
//     ->name('user.create');

// Route::post('/users', [UserController::class, 'store'])
//     ->name('user.store');

// Route::post('/users', [PostController::class, 'store'])
//     ->name('post.store');


// Post/Update/Delete
Route::post('/comments', [CommentController::class, 'store'])
    ->name('comment.store')->middleware(['auth']);

Route::delete('/comments/{id}', [CommentController::class, 'destroy'])
    ->name('comment.destroy')->middleware(['auth']);

Route::get('/comments/{id}', [CommentController::class, 'edit'])
    ->name('comment.edit')->middleware(['auth']);

// Friend add/remove
Route::post('/friend', [FriendController::class, 'store'])
    ->name('friend.store')->middleware(['auth']);

Route::delete('/friend/{id}', [FriendController::class, 'destroy'])
    ->name('friend.destroy')->middleware(['auth']);


require __DIR__.'/auth.php';
