<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::all();

        if ($employees->isEmpty()) {
            $this->command->warn('Tidak ada employee, skip AttendanceSeeder.');
            return;
        }

        $statuses = ['present', 'late', 'absent', 'permission', 'sick'];

        foreach ($employees as $employee) {
            // Buat absensi 7 hari terakhir
            for ($i = 0; $i < 7; $i++) {
                $date = now()->subDays($i)->toDateString();

                Attendance::create([
                    'employee_id' => $employee->id,
                    'date' => $date,
                    'check_in' => '08:00:00',
                    'check_out' => '17:00:00',
                    'status' => $statuses[array_rand($statuses)],
                    'notes' => null,
                ]);
            }
        }
    }
}