<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gig>
 */
class GigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $additionalInfo = random_int(0, 1) ? $this->faker->text(random_int(5, 20)) : null;

        return [
            'name' => $this->faker->name(),
            'additional_info' => $additionalInfo,
        ];
    }
}
