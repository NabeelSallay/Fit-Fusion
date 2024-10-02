<?php

namespace Database\Seeders;

use App\Models\clients;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        clients::factory()->count(100)->create();
    }
}
