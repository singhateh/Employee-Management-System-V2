<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $table = "designations";

    protected $fillable = ['employee_id', 'designation_type'];

    public function users()
    {
        return $this->belongsTo('App\User', 'employee_id');
    }
}
