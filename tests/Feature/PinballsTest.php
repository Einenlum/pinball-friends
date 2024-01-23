<?php

use App\Models\Pinball;
use function Pest\Laravel\{get, post, put, delete};

it('lists pinballs in a gig', function() {
    get('/gigs/1')
        ->assertStatus(200)
        ->assertSee('Pinballs')
        ->assertSee('Monster Bash')
        ->assertSee('Deadpool');
});

it('shows a pinball and its scores', function() {
    get('/pinballs/1')
        ->assertStatus(200)
        ->assertSee('Monster Bash')
        ->assertSee('Scores')
        ->assertSee('123.000 millions')
        ->assertSee('1.000 million');
});

it('shows edit a pinball page', function() {
    get('/pinballs/1/edit')
        ->assertStatus(200)
        ->assertSee('Edit Monster Bash');
});

it('edits a pinball', function() {
    put('/pinballs/1', ['name' => 'New Monster Bash'])
        ->assertRedirect('/pinballs/1');

    expect(Pinball::find(1)->name)->toBe('New Monster Bash');
});

it('shows add a pinball page', function() {
    get('/gigs/1/pinballs/create')
        ->assertSee('Add a pinball');
});

it('adds a pinball', function() {
    post('/gigs/1/pinballs', ['name' => 'Star Wars'])
        ->assertRedirect('/pinballs/3');

    expect(Pinball::find(3)->name)->toBe('Star Wars');
});

it('deletes a pinball', function() {
    delete('/pinballs/1')
        ->assertRedirect('/gigs/1');

    expect(Pinball::count())->toBe(1);
});
