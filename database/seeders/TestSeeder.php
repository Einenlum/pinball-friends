<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Gig;
use App\Models\Pinball;
use App\Models\Player;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $petanque = Gig::create([
            'name' => 'Petanque',
            'additional_info' => 'Rue Étienne Dolet',
        ]);

        $monsterBash = Pinball::create([
            'gig_id' => $petanque->id,
            'name' => 'Monster Bash',
            'additional_info' => 'Williams, 1998',
        ]);
        $deadpool = Pinball::create([
            'gig_id' => $petanque->id,
            'name' => 'Deadpool',
            'additional_info' => 'Stern, 2018'
        ]);


        $jeanPierre = Player::create([
            'name' => 'Jean-Pierre',
        ]);
        $patrick = Player::create([
            'name' => 'Patrick',
        ]);

        $monsterBash->scores()->create([
            'player_id' => $jeanPierre->id,
            'value' => million(123),
        ]);
        $monsterBash->scores()->create([
            'player_id' => $patrick->id,
            'value' => million(1),
        ]);

        $deadpool->scores()->create([
            'player_id' => $jeanPierre->id,
            'value' => million(5),
        ]);
        $deadpool->scores()->create([
            'player_id' => $patrick->id,
            'value' => million(83),
        ]);
    }
}
