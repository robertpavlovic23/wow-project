<?php

use App\Http\Controllers\FormController;
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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing

Route::get('/', function () {
    return view('/home');
});

// Show Register/Create User Form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
// Create New User
Route::post('/users', [UserController::class, 'store']);
// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// Update User Info
Route::put('/user/update', [UserController::class, 'update'])->middleware('auth');


// Show Profile Page
Route::get('/profile', [UserController::class, 'edit'])->middleware('auth');

// Show Form Page
Route::get('/form', [FormController::class, 'create']);

// Store Form Data
Route::post('/form/create', [FormController::class, 'store']);