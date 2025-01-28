<?php

namespace Database\Seeders\Source;

use Domain\Source\Entities\Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['guardian', 'nyt', 'newsapi'];

        foreach ($names as $name) {
            Source::create([
                'name' => $name,
                'api_url' => config('auth.api_url.' . $name),
                'api_key' => config('auth.api_key.' . $name),
            ]);
        }
    }
}
