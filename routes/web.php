<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

// Default path
Route::get('/', function () {
    return view('welcome');
});

// It was here before me :(
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Shows current user web page
Route::get('/users/{id}', [UserController::class, 'show']);
// Route::get('/user/{id}', function($id) {
//     return view('user', ['id'=>$id]);
// });

// Shows every possible user
Route::get('/users', [UserController::class, 'index']);

// It will be updated later on
Route::middleware(['auth'])->group(function(){
    Route::view('/admin','admin')->name('admin');
});

require __DIR__.'/auth.php';
