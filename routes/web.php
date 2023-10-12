<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;

Route::get('/', function () {return view('top');});

Route::get('/game', [GamesController::class, 'index'])->name('game.start');

Route::post('/game/select', [GamesController::class, 'select'])->name('game.select');

