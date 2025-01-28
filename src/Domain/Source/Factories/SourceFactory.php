<?php

declare(strict_types=1);

namespace Domain\Source\Factories;

use Domain\Source\Entities\Source;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class SourceFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    protected $model = Source::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = ['guardian', 'nyt', 'newsapi'];
        
        $fake_name = $this->faker->randomElement($names);

        return [
            'name' => $fake_name,
            'api_url' => config('auth.api_url.' . $fake_name),
            'api_key' => config('auth.api_key.' . $fake_name),
        ];
    }
}
