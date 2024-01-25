<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::all();
        $searchablePlayers = $players->map(function (Player $player) {
            return [
                'id' => $player->id,
                'name' => $player->name,
            ];
        });
        return view('players.index', [
            'players' => Player::all(),
            'searchablePlayers' => $searchablePlayers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('players.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $player = Player::create($data);

        return redirect()
            ->route('players.show', ['player' => $player->id])
            ->with('success', 'Joueur créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        return view('players.show', [
            'player' => $player
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        return view('players.edit', [
            'player' => $player,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $playerName = $player->name;
        $player->update($data);

        return redirect()
            ->route('players.show', ['player' => $player->id])
            ->with('success', "Player {$playerName} was updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $playerName = $player->name;

        $player->delete();

        return redirect()
            ->route('players.index')
            ->with('success', "Player $playerName was deleted");
    }
}
