<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $fillable  = ['employee_id','salary_id','salary_type_id','user_id','paid_amount','transaction_date','remark','description'];
}
