<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptDetail extends Model
{
    protected $table = "receipt_details";
    protected $fillable  = ['employee_id','receipt_id','transaction_id'];

}
