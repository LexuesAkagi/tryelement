<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class GamesController extends Controller
{

    public function index()
    {
        $drawCards = Card::inRandomOrder()->take(5)->get();
        return view('game', [
            'drawCards' => $drawCards,
        ]);
    }

}
