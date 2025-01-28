<?php

namespace Database\Seeders;

use Database\Seeders\Article\ArticleSeeder;
use Database\Seeders\Preference\PreferenceSeeder;
use Database\Seeders\Source\SourceSeeder;
use Database\Seeders\User\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SourceSeeder::class,
            ArticleSeeder::class,
            PreferenceSeeder::class,
            UserSeeder::class,
        ]);
    }
}
