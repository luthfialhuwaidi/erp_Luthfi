<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\User;
use App\Models\Department;
use App\Models\Position;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $department = Department::first();
        $position = Position::first();

        if ($user && $department && $position) {
            Employee::create([
                'user_id' => $user->id,
                'department_id' => $department->id,
                'position_id' => $position->id,
                'address' => 'Jl. Sudirman No. 123, Jakarta',
                'pob' => 'Jakarta',
                'dob' => '1995-05-15',
                'gender' => 'male',
                'religion' => 'islam',
                'phone_number' => '081234567890',
                'salary' => 7500000,
                'start_date' => '2023-01-01',
                'end_date' => null,
                'status' => 'active',
            ]);
        }
    }
}
