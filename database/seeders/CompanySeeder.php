<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buat satu perusahaan contoh 'name', 'address', 'email', 'phone_number', 'logo'
        Company::create([
            'name' => 'PT Mencari Duit',
            'address' => 'Jl. Cempaka No. 123',
            'email' => 'info-duit@example.com',
            'phone_number' => '081234567890',
            'logo' => 'logo.png',
        ]);
    }
}
