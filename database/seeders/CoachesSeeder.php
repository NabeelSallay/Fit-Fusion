<?php

namespace Database\Seeders;

use App\Models\coaches;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoachesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        coaches::factory()->count(100)->create();
    }
}
