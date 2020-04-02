<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OvertimePayment extends Model
{
    protected $table = 'overtimepayments';

    public function employees()
    {
        return $this->belongsTo('App\User', 'employee_id');
    }
}
