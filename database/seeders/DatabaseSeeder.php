<?php

namespace Database\Seeders;

use App\Models\Gig;
use App\Models\Pinball;
use App\Models\Player;
use App\Models\Score;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gig::factory()->count(30)->create();

        Pinball::factory()->count(30)->create();

        Player::factory()->count(30)->create();

        Score::factory()->count(30)->create();
    }
}
