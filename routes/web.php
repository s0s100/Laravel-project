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

// AJAX
Route::get('comments', [CommentController::class, 'page'])
    ->middleware(['auth']);

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

// Image upload
Route::post('/users/upload-avatar', [UserController::class, 'uploadAvatar']) 
    ->name('avatar.upload');

// Post create/delete/update
Route::get('/posts/createpost', function() { 
    return view('posts/createpost');
}) ->name('posts.create.post')->middleware(['auth']);

Route::post('/posts/store', [PostController::class, 'store'])
 ->name('post.store')->middleware(['auth']);

Route::delete('/posts/{id}', [PostController::class, 'destroy'])
    ->name('post.destroy')->middleware(['auth']);

Route::post('/posts/{id}', [PostController::class, 'update'])
    ->name('post.update')->middleware(['auth']);

require __DIR__.'/auth.php';
