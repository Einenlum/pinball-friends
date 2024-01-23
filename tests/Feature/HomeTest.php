<?php

it('shows homepage', function() {
    $this->get('/')
        ->assertStatus(200)
        ->assertSee('Pinball Friends')
        ->assertSee('Gigs')
        ->assertSee('Players');
});
