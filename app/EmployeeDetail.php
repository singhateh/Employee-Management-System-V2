<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    protected $table = "employment_details";

    protected $fillable = ['employee_id', 'roll_no','employee_type','office_email','emergency_number','passport','updated_at','created_at'];
}
