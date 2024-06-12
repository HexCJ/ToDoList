<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListController;
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

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');



Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
Route::post('/profiletambah', [DashboardController::class, 'store'])->name('tambah_profile');
Route::put('/listedit{id}', [DashboardController::class, 'update'])->name('update_profile');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/list', [ListController::class, 'show'])->name('list');
Route::post('/listtambah', [ListController::class, 'store'])->name('tambah_list');
Route::put('/listedit{id}', [ListController::class, 'update'])->name('update_list');
Route::get('/list/delete/{id}', [ListController::class, 'destroy'])->name('list.delete');



require __DIR__.'/auth.php';
