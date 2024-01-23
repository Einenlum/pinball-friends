<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use App\Models\Pinball;
use App\Models\Player;
use Illuminate\Http\Request;

class PinballController extends Controller
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
    public function create(Request $request, Gig $gig)
    {
        return view('pinballs.create', [
            'gig' => $gig,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Gig $gig)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'additional_info' => 'nullable|string|max:255',
        ]);

        $pinball = Pinball::create([
            'name' => $data['name'],
            'additional_info' => $data['additional_info'] ?? null,
            'gig_id' => $gig->id,
        ]);

        return redirect()
            ->route('pinballs.show', ['pinball' => $pinball->id])
            ->with('success', "Pinball {$pinball->name} was created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Pinball $pinball)
    {
        return view('pinballs.show', [
            'pinball' => $pinball,
            'players' => Player::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pinball $pinball)
    {
        return view('pinballs.edit', [
            'pinball' => $pinball,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pinball $pinball)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $pinballName = $pinball->name;
        $pinball->update($data);

        return redirect()
            ->route('pinballs.show', ['pinball' => $pinball->id])
            ->with('success', "Pinball {$pinballName} was updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pinball $pinball)
    {
        $gigId = $pinball->gig->id;
        $pinballName = $pinball->name;
        $pinball->delete();

        return redirect()
            ->route('gigs.show', ['gig' => $gigId])
            ->with('success', "Pinball {$pinballName} was deleted");
    }
}
