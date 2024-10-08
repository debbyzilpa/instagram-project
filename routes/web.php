<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;


/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication Routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'Anda telah logout.');
})->name('logout');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Home Route
Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

// Photo Routes
Route::get('/', [PhotoController::class, 'index'])->middleware('auth')->name('photos.index');
Route::get('/photos/create', [PhotoController::class, 'create'])->name('photos.create');
Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');
Route::get('/photos/{photo}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
Route::put('/photos/{photo}', [PhotoController::class, 'update'])->name('photos.update');
Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');

// Like/Unlike Routes
Route::post('/photos/{photo}/like', [PhotoController::class, 'like'])->name('photos.like');
Route::post('/photos/{photo}/unlike', [PhotoController::class, 'unlike'])->name('photos.unlike');
Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile'); // Rute untuk menampilkan profi    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
});
