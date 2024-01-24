<?php

namespace Database\Seeders;

use App\Models\Gig;
use App\Models\Pinball;
use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nathan = Player::create(['name' => 'Nathan']);
        $zoe = Player::create(['name' => 'Zoe']);
        $jacob = Player::create(['name' => 'Jacob']);
        $isabella = Player::create(['name' => 'Isabella']);
        $lucas = Player::create(['name' => 'Lucas']);
        $mia = Player::create(['name' => 'Mia']);
        $oliver = Player::create(['name' => 'Oliver']);

        $frothyFox = Gig::create([
            'name' => 'The Frothy Fox',
            'additional_info' => '44 Sycamore Lane',
        ]);

        $deadPool = Pinball::create([
            'gig_id' => $frothyFox->id,
            'name' => 'Deadpool',
            'additional_info' => 'Stern',
        ]);

        $deadPoolScores = [
            $nathan->id => 51_123_478,
            $lucas->id => 12_671_981,
            $mia->id => 787_611,
        ];
        foreach ($deadPoolScores as $playerId => $score) {
            $deadPool->scores()->create([
                'player_id' => $playerId,
                'value' => $score,
            ]);
        }

        $attackFromMars = Pinball::create([
            'gig_id' => $frothyFox->id,
            'name' => 'Attack from Mars',
            'additional_info' => 'Bally',
        ]);

        $attackFromMarsScores = [
            $nathan->id => 187_123_478,
            $zoe->id => 879_671_981,
        ];
        foreach ($attackFromMarsScores as $playerId => $score) {
            $attackFromMars->scores()->create([
                'player_id' => $playerId,
                'value' => $score,
            ]);
        }

        // ---

        $barrelAndBellow = Gig::create([
            'name' => 'Barrel & Bellow',
            'additional_info' => '78 Oak Street',
        ]);

        // ---

        $pintAndPlank = Gig::create(['name' => 'Pint and Plank']);
        $whoDunnit = Pinball::create([
            'gig_id' => $pintAndPlank->id,
            'name' => 'Who Dunnit',
            'additional_info' => 'Bally, 1995',
        ]);

        $whoDunnitScores = [
            $lucas->id => 789_798_120,
            $jacob->id => 671_871,
            $oliver->id => 611_789_000,
        ];
        foreach ($whoDunnitScores as $playerId => $score) {
            $whoDunnit->scores()->create([
                'player_id' => $playerId,
                'value' => $score,
            ]);
        }

        // ---

        $tipsyTumblerTavern = Gig::create([
            'name' => 'Tipsy Tumbler Tavern',
            'additional_info' => '56 Birch Boulevard',
        ]);

        $theAddamsFamily = Pinball::create([
            'gig_id' => $tipsyTumblerTavern->id,
            'name' => 'The Addams Family',
            'additional_info' => 'Bally, 1992',
        ]);
        $theAddamsFamilyScores = [
            $isabella->id => 711_789_110,
            $zoe->id => 798_091_720,
            $oliver->id => 611_789_000,
            $mia->id => 18_087_120,
        ];
        foreach ($theAddamsFamilyScores as $playerId => $score) {
            $theAddamsFamily->scores()->create([
                'player_id' => $playerId,
                'value' => $score,
            ]);
        }

        $avatar = Pinball::create([
            'gig_id' => $tipsyTumblerTavern->id,
            'name' => 'Avatar',
            'additional_info' => 'Stern, 2010',
        ]);
        $avatarScores = [
            $nathan->id => 518_123_478,
        ];
        foreach ($avatarScores as $playerId => $score) {
            $avatar->scores()->create([
                'player_id' => $playerId,
                'value' => $score,
            ]);
        }

        $theSopranos = Pinball::create([
            'gig_id' => $tipsyTumblerTavern->id,
            'name' => 'The Sopranos',
            'additional_info' => 'Stern, 2005',
        ]);
        $theSopranosScores = [
            $oliver->id => 47_871_981,
            $isabella->id => 1_789_000,
        ];
        foreach ($theSopranosScores as $playerId => $score) {
            $theSopranos->scores()->create([
                'player_id' => $playerId,
                'value' => $score,
            ]);
        }

        $theWalkingDead = Pinball::create([
            'gig_id' => $tipsyTumblerTavern->id,
            'name' => 'The Walking Dead',
            'additional_info' => 'Stern, 2014',
        ]);
        $theWalkingDeadScores = [
            $lucas->id => 791_897,
            $zoe->id => 121_861_315,
        ];
        foreach ($theWalkingDeadScores as $playerId => $score) {
            $theWalkingDead->scores()->create([
                'player_id' => $playerId,
                'value' => $score,
            ]);
        }

        // ---

        $hopsAndHandlebars = Gig::create([
            'name' => 'Hops & Handlebars',
            'additional_info' => '23 Pine Place',
        ]);

        $metallica = Pinball::create([
            'gig_id' => $hopsAndHandlebars->id,
            'name' => 'Metallica',
            'additional_info' => 'Stern, 2013',
        ]);
        $metallicaScores = [
            $jacob->id => 67_981_081,
            $mia->id => 2_989_794_124,
        ];
        foreach ($metallicaScores as $playerId => $score) {
            $metallica->scores()->create([
                'player_id' => $playerId,
                'value' => $score,
            ]);
        }

        $fooFighters = Pinball::create([
            'gig_id' => $hopsAndHandlebars->id,
            'name' => 'Foo Fighters',
        ]);
        $fooFightersScores = [
            $zoe->id => 11_898_094,
            $oliver->id => 1_879_191,
        ];
        foreach ($fooFightersScores as $playerId => $score) {
            $fooFighters->scores()->create([
                'player_id' => $playerId,
                'value' => $score,
            ]);
        }

        $starWars = Pinball::create([
            'gig_id' => $hopsAndHandlebars->id,
            'name' => 'Star Wars',
            'additional_info' => 'Stern, 2017',
        ]);
        $starWarsScores = [
            $mia->id => 24_749_011,
        ];
        foreach ($starWarsScores as $playerId => $score) {
            $starWars->scores()->create([
                'player_id' => $playerId,
                'value' => $score,
            ]);
        }

        // ---

        $whiskersWhistle = Gig::create([
            'name' => 'Whisker\'s Whistle',
            'additional_info' => '91 Cedar Street',
        ]);

        $theLordOfTheRings = Pinball::create([
            'gig_id' => $whiskersWhistle->id,
            'name' => 'The Lord of the Rings',
        ]);
        $theLordOfTheRingsScores = [
            $nathan->id => 79_871_981,
            $zoe->id => 891_000,
            $lucas->id => 25_789_000,
        ];
        foreach ($theLordOfTheRingsScores as $playerId => $score) {
            $theLordOfTheRings->scores()->create([
                'player_id' => $playerId,
                'value' => $score,
            ]);
        }
    }
}
