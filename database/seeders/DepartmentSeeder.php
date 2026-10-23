<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'name' => 'Human Resources',
            'description' => 'Manages employee relations and recruitment',
            'address' => '123 Main St',
            'email' => 'rian@company.com',
            'phone_number' => '555-1234'
        ]);
    }
}
