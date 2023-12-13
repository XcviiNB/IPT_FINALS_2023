<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuyGameController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\LogController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'loginForm'])->name('login');
    Route::get('/register', [AuthController::class, 'registerForm']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);
});

Route::middleware(['auth','verified'])->group(function() {
    Route::get('/dashboard', [GamesController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/gamestore', [BuyGameController::class, 'index']);
    Route::post('/buy/{game}', [BuyGameController::class, 'buy'])->name('games.buy');
});

Route::middleware(['auth', 'role:manager'])->group(function() {
    //Games
    Route::get('/games/add', [GamesController::class, 'create'])->name('games.create');
    Route::post('/games', [GamesController::class, 'store'])->name('games.store');
    Route::get('/games/{game}/edit', [GamesController::class, 'edit'])->name('games.edit');
    Route::patch('/games/{game}', [GamesController::class, 'update'])->name('games.update');
    Route::delete('/games/{game}', [GamesController::class, 'destroy'])->name('games.destroy');
});

Route::middleware(['auth', 'role:administrator'])->group(function() {
    //Logs
    Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
});


