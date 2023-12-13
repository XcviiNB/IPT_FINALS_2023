<?php

namespace App\Http\Controllers;

use App\Mail\GamePurchased;
use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BuyGameController extends Controller
{
    public function index() {
        $games = Games::where('available', true)->get();
        return view('Games.buy-games', compact('games'));
    }

    public function buy($id) {
        $game = Games::findOrFail($id);
        $user = auth()->user();

        Mail::to($user->email)->send(new GamePurchased($game, $user));

        return back()->with('success', 'Purchase successful, email sent!');
    }
}
