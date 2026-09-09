<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;


#[Fillable(['name', 'address', 'email', 'phone_number', 'logo'])]
class Company extends Model
{
  
}
