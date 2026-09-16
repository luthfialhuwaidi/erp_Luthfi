<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'PT Real Estate',
            'address' => 'Jl. Jendral Sudirman No. 123, Pekanbaru, Riau',
            'email' => 'realestate@erp.com',
            'phone_number' => '081234567890',
        ]);
    }
}
