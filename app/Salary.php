<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = "salaries";

    protected $fillable = ['employee_id', 'salary_amount','salary_type','allowance_amount','bank_name','account_number','updated_at','created_at'];

    public function users()
    {
        return $this->belongsTo('App\User', 'employee_id');
    }

    public function scopeAdvance($query)
    {
        return $query->where('salary_amount',true);
    }
}
