<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {return view('top');});

Route::get('/game', function (){return view('game');
})->name('game.start');



// Route::get('/game', [GamesController::class, 'index'])->name('game.start);