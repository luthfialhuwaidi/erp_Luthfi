<?php

namespace App\Models;

use App\Observers\EmployeeObserver;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'department_id', 'position_id', 'address', 'pob', 'dob', 'gender', 'religion', 'phone_number', 'salary', 'start_date', 'end_date', 'status', 'image'])]
#[ObservedBy([EmployeeObserver::class])]
class Employee extends Model
{

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }
}