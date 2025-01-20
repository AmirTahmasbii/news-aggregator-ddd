<?php

declare(strict_types=1);

namespace Domain\Article\Factories;

use Domain\Article\Entities\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ArticleFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    protected $model = Article::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'content' => fake()->text(),
            'keywords' => fake()->word(),
            'category' => fake()->word(),
            'author' => fake()->name(),
            'source_id' => fake()->numberBetween(1, 3),
            'published_at' => fake()->dateTime(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
