<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;
use App\Models\Positions;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        Positions::create([
            'name' => 'Software Engineer',
            'description' => 'Develops and maintains software applications',
            'allowance' => 50000,
        ]);

        Positions::create([
            'name' => 'Manager',
            'description' => 'Manages team and operations',
            'allowance' => 75000,
        ]);

        Positions::create([
            'name' => 'Staff',
            'description' => 'General staff position',
            'allowance' => 30000,
        ]);
    }
}