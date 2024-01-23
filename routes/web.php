<?php

use App\Http\Controllers\GigController;
use App\Http\Controllers\PinballController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreController;
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

Route::middleware(['basic_access'])->group(function() {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::resource("gigs", GigController::class);
    Route::resource("players", PlayerController::class);

    Route::resource("pinballs", PinballController::class)->except(['create', 'store']);
    Route::get(
        "gigs/{gig}/pinballs/create",
        [PinballController::class, 'create'],
    )->name('pinballs.create');
    Route::post(
        "gigs/{gig}/pinballs",
        [PinballController::class, 'store'],
    )->name('pinballs.store');

    Route::post(
        "pinballs/{pinball}/scores",
        [ScoreController::class, 'store']
    )->name('scores.store');
});
