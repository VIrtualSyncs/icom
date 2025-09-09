<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HeroesController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\usercontroller;

Route::get('/', [DashboardController::class, 'master'])->name('master')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'viewdata'])->name('viewdata')->middleware('auth');

// Heroes routes
Route::resource('heroes', HeroesController::class)->middleware('auth');

// Highlights routes
Route::resource('highlights', HighlightController::class)->middleware('auth');

// Facilities routes
Route::resource('facilities', FacilitiesController::class)->middleware('auth');

// Units routes
Route::resource('units', \App\Http\Controllers\UnitsController::class)->middleware('auth');

// Message routes
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index')->middleware('auth');
Route::post('/input_messege', [MessageController::class, 'input_messege'])->name('input_pesan')->middleware('auth');
Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show')->middleware('auth');
Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy')->middleware('auth');

// Trash routes
Route::get('/messages-trash', [MessageController::class, 'trash'])->name('messages.trash')->middleware('auth');
Route::patch('/messages/{id}/restore', [MessageController::class, 'restore'])->name('messages.restore')->middleware('auth');
Route::delete('/messages/{id}/force-delete', [MessageController::class, 'forceDelete'])->name('messages.force-delete')->middleware('auth');

// Login routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', function () {
    return view('dashboard');
})->middleware('auth'); // hanya bisa diakses kalau login

//user
Route::get('/user', [usercontroller::class, 'index_user'])->name('index.user');