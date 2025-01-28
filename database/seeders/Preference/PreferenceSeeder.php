<?php

namespace Database\Seeders\Preference;

use Domain\Preference\Entities\Preference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreferenceSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Preference::factory()->count(3)->create();
    }
}
