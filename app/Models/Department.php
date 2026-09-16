<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable('name', 'description', 'address', 'email', 'phone_number')]
class Department extends Model
{
    //
}
