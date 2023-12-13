<?php

namespace App\Http\Controllers;

use App\Events\UserLog;
use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GamesController extends Controller
{
    public function index() {
        $games = Games::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['games' => $games]);
    }

    public function create() {
        return view('Games.add-game');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'game_title'    => 'required|string|max:255',
            'date_released' => 'required|date',
            'synopsis'      => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'available'     => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images/games', 'public');
        }

        $game = Games::create($validated);

        $user = auth()->user();
        event(new UserLog($user->name . " added a game titled \"" . $game->game_title . "\". Game ID #" . $game->id));

        return redirect('/dashboard')->with('success', 'Game added successfully!');
    }

    public function edit(Games $game) {
        return view('Games.edit-game', ['game' => $game]);
    }

    public function update(Request $request, Games $game) {
        $validated = $request->validate([
            'game_title'    => 'required|string|max:255',
            'date_released' => 'required|date',
            'synopsis'      => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'available'     => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images/games', 'public');
        }

        $game->update($validated);

        $user = auth()->user();
        event(new UserLog($user->name . " updated the game \"" . $game->game_title . "\". Game ID #" . $game->id));

        return redirect('/dashboard')->with('update', 'Game updated successfully!');
    }

    public function destroy(Games $game) {
        $user = auth()->user()->name;

        $log_entry = $user . " deleted the game \"" . $game->game_title . "\". Game ID #" . $game->id;
        event(new UserLog($log_entry));

        $game->delete();

        return redirect('/dashboard')->with('remove', 'Game removed successfully!');
    }
}
