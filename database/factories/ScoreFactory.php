<?php

namespace Database\Factories;

use App\Models\Pinball;
use App\Models\Player;
use App\Models\Score;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Score>
 */
class ScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $value = $this->faker->numberBetween(100_000, 1_000_000_000);

        [$randomPlayer, $randomPinball] = $this->getRandomPlayerAndPinball();

        return [
            'player_id' => $randomPlayer->id,
            'pinball_id' => $randomPinball->id,
            'value' => $value,
        ];
    }

    /**
     * @return array{int: \App\Models\Player, int: \App\Models\Pinball}
     */
    private function getRandomPlayerAndPinball(int $loop = 0): array
    {
        $randomPlayer = Player::inRandomOrder()->first();
        $randomPinball = Pinball::inRandomOrder()->first();

        if (Score::where('player_id', $randomPlayer->id)
            ->where('pinball_id', $randomPinball->id)->exists()) {
            $loop++;

            if ($loop > 10) {
                throw new \Exception('Could not find a unique player and pinball combination');
            }

            return $this->getRandomPlayerAndPinball($loop);
        }

        return [$randomPlayer, $randomPinball];
    }
}
