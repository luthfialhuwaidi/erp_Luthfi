<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Positions;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Positions::create([
            'name' => 'Software Engineer',
            'description' => 'Develops and maintains software applications',
            'allowance' => '$50,000'
        ]);
    }
}
