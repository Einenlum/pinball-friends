<?php

use App\Models\Player;
use Illuminate\Support\Collection;
use function Pest\Laravel\{get, post, put, delete};

it('lists players', function() {
    get('/players')
        ->assertStatus(200)
        ->assertSee('Players')
        ->assertViewHas('players', function(Collection $players) {
            return $players->count() === 2;
        })
        ->assertViewHas('players', function(Collection $players) {
            return $players->pluck('name') == collect(['Jean-Pierre', 'Patrick']);
        });
});

it('shows a player', function() {
    get('/players/1')
        ->assertStatus(200)
        ->assertSee('Jean-Pierre');
});

it('shows create a player page', function() {
    get('/players/create')
        ->assertStatus(200)
        ->assertSee('Add a player');
});

it('shows edit a player page', function() {
    get('/players/1/edit')
        ->assertStatus(200)
        ->assertSee('Edit Jean-Pierre');
});

it('edits a player', function() {
    put('/players/1', ['name' => 'New Jean-Pierre'])
        ->assertRedirect('/players/1');

    expect(Player::find(1)->name)->toBe('New Jean-Pierre');
});

it('adds a player', function() {
    post('/players', ['name' => 'Michel'])
        ->assertRedirect('/players/3');

    expect(Player::find(3)->name)->toBe('Michel');
});

it('deletes a player', function() {
    delete('/players/2')
        ->assertRedirect('/players');

    expect(Player::find(2))->toBe(null);
    expect(Player::count())->toBe(1);
});
