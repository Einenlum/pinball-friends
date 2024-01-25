<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use App\Models\Pinball;
use Illuminate\Http\Request;

class GigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gigs = Gig::all();
        $searchableGigs = $gigs->map(function (Gig $gig) {
            return [
                'id' => $gig->id,
                'name' => $gig->name,
            ];
        });

        return view('gigs.index', [
            'gigs' => $gigs,
            'searchableGigs' => $searchableGigs,
        ]);
    }

    /**
 * Show the form for creating a new resource.
 */
    public function create()
    {
        return view('gigs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'additional_info' => 'nullable|string|max:255',
        ]);

        $gig = Gig::create($data);

        return redirect()
            ->route('gigs.show', ['gig' => $gig])
            ->with('success', "Gig {$gig->name} was created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Gig $gig)
    {
        $searchablePinballs = $gig->pinballs->map(function (Pinball $pinball) {
            return [
                'id' => $pinball->id,
                'name' => $pinball->name,
            ];
        });

        return view('gigs.show', [
            'gig' => $gig,
            'searchablePinballs' => $searchablePinballs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gig $gig)
    {
        return view('gigs.edit', [
            'gig' => $gig
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gig $gig)
    {
        $gigName = $gig->name;
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'additional_info' => 'nullable|string|max:255',
        ]);

        $gig->update($data);

        return redirect()
            ->route('gigs.show', ['gig' => $gig])
            ->with('success', "Gig {$gigName} was updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gig $gig)
    {
        $gigName = $gig->name;
        $gig->delete();

        return redirect()
            ->route('gigs.index')
            ->with('success', "Gig {$gigName} was deleted");
    }
}
