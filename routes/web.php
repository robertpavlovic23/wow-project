<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RaidPlannerController;
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

// Show Admin Panel
Route::get('/admin', [UserController::class, 'admin'])->middleware('admin');
// Delete User Account From Admin Page
Route::delete('/admin/destroy/{user}', [UserController::class, 'destroyAdmin'])->middleware('auth');

// Show Register/Create User Form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
// Create New User
Route::post('/users', [UserController::class, 'store'])->middleware('guest');
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
// Delete User Account From Profile Page
Route::delete('/user/destroy/{user}', [UserController::class, 'destroy'])->middleware('auth');

// Show Form Page
Route::get('/form', [FormController::class, 'create']);
// Store Form Data
Route::post('/forms/create', [FormController::class, 'store']);

// Show Forms
Route::get('/forms', [FormController::class, 'show'])->middleware('admin');
// Show Single Form
Route::get('/forms/{form}', [FormController::class, 'single'])->middleware('admin');
// Delete Single Form
Route::delete('/forms/{form}', [FormController::class, 'destroy'])->middleware('admin');


// Show Raid Planner Page
Route::get('/raid-planner', [RaidPlannerController::class, 'show'])->middleware('auth');

// Store New Character
Route::post('/character/create', [CharacterController::class, 'store'])->middleware('auth');
// Delete Selected Character
Route::delete('/character/destroy/{character_id}', [CharacterController::class, 'destroy'])->middleware('auth');