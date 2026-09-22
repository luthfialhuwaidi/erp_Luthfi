<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['employee_id', 'date', 'check_in', 'check_out', 'status', 'notes'])]
class Attendance extends Model
{
    protected $casts = [
        'date' => 'date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function attendances()
{
    return $this->hasMany(Attendance::class);
}
}