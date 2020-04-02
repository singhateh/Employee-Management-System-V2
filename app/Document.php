<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
   protected $fillable = ['employee_id','document_name','document_size','document_extension','document_unique_name'];
}
