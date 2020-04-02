<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusPayment extends Model
{
    protected $table = 'bonuspayments';

    public function employees()
    {
        return $this->belongsTo('App\User', 'employee_id');
    }
}
