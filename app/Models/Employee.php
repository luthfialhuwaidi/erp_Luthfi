<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['user_id','department_id','position_id','address','pob','dob','gender','religion','phone_number','salary','start_date','end_date','status','image'])]
class Employee extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
