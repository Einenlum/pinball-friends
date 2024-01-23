<?php

use App\Models\Gig;
use Illuminate\Support\Collection;
use function Pest\Laravel\{get, post, put, delete};

it('lists gigs', function() {
    get('/gigs')
        ->assertStatus(200)
        ->assertSee('Gigs')
        ->assertViewHas('gigs', function(Collection $gigs) {
            return $gigs->count() === 1;
        })
        ->assertViewHas('gigs', function(Collection $gigs) {
            return $gigs->pluck('name') == collect(['Petanque']);
        });
});

it('shows a gig and lists its pinballs', function() {
    get('/gigs/1')
        ->assertStatus(200)
        ->assertSee('Petanque')
        ->assertSee('Pinballs')
        ->assertSee('Monster Bash')
        ->assertSee('Deadpool');
});

it('shows edit a gig page', function() {
    get('/gigs/1/edit')
        ->assertStatus(200)
        ->assertSee('Edit Petanque');
});

it('edits a gig', function() {
    put('/gigs/1', ['name' => 'New Petanque'])
        ->assertRedirect('/gigs/1');

    expect(Gig::find(1)->name)->toBe('New Petanque');
});

it('adds a gig', function() {
    post('/gigs', ['name' => 'Mécanique'])
        ->assertRedirect('/gigs/2');

    expect(Gig::find(2)->name)->toBe('Mécanique');
});

it('deletes a gig', function() {
    delete('/gigs/1')
        ->assertRedirect('/gigs');

    expect(Gig::count())->toBe(0);
});
