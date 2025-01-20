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
        $names = ['Guardian', 'BBC', 'NewsAPI'];
        $randomName = $names[array_rand($names)];

        return [
            'name' => $randomName,
        ];
    }
}
