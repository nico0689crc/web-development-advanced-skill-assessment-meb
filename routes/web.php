<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'index'])->name('dashboard');

Route::get('/events', [UserController::class, 'eventsView'])->name('events');

Route::get('/aboutus', [UserController::class, 'aboutusView'])->name('aboutus');

Route::get('/createuser', [UserController::class, 'createUserView'])->name('createuser');

Route::post('/createuser', [UserController::class, 'store'])->name('createuser');



Route::get('/usersedit/{id}', [UserController::class, 'edit'])->name('users.edit');

Route::put('/usersedit/{id}', [UserController::class, 'update'])->name('users.update');

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.delete');

Route::get('login', [UserController::class, 'loginView'])->name('login');
Route::post('logout', [UserController::class, 'logoutSubmit'])->name('logout');
Route::post('login', [UserController::class, 'loginSubmit']);
