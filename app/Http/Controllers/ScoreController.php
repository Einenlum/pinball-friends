<?php

namespace App\Http\Controllers;

use App\Models\Pinball;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pinball $pinball)
    {
        $inMillions = $request->has('in_millions');

        $data = $request->validate([
            'player_id' => 'required|integer|exists:players,id',
            'value' => 'required|'. ($inMillions ? 'decimal:0,6' : 'integer'),
        ]);

        $score = Score::updateOrCreate(
            ['player_id' => $data['player_id'], 'pinball_id' => $pinball->id],
            [
            'player_id' => $data['player_id'],
            'pinball_id' => $pinball->id,
            'value' => $inMillions ? $data['value'] * 1_000_000 : $data['value'],
            ]
        );

        return redirect()
            ->route('pinballs.show', ['pinball' => $pinball])
            ->with('success', 'Score créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Score $score)
    {
        //
    }
}
