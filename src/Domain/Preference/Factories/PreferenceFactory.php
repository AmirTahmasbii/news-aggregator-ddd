<?php

declare(strict_types=1);

namespace Domain\Preference\Factories;

use Domain\Preference\Entities\Preference;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class PreferenceFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    protected $model = Preference::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category' => fake()->word(),
            'author' => fake()->name(),
            'source_id' => fake()->numberBetween(1, 3),
            'user_id' => fake()->numberBetween(1, 3),
        ];
    }
}
