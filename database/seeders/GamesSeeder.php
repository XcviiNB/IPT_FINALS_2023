<?php

namespace Database\Seeders;

use App\Models\Games;
use Database\Factories\GamesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Games::factory(10)->create();
    }
}
