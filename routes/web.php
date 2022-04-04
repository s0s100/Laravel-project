<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

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

// Default path
Route::get('/', function () {
    return view('welcome');
});

// It was here before me :(
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Shows current user web page
Route::get('/user/{id}', function($id) {
    return view('user', ['id'=>$id]);
});

// Shows every possible user
Route::get('/users', [UserController::class, 'index']);
// Route::get('/user2/{id}', function($id) {
//     //return User::get($id)->name;
//     return DB::
// });

// It will be updated later on
Route::middleware(['auth'])->group(function(){
    Route::view('/admin','admin')->name('admin');
});

require __DIR__.'/auth.php';
