<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = "skills";

    protected $fillable = ['employee_id', 'skill_name1','skill_name2','skill_name3','updated_at','created_at'];

    public function users()
    {
        return $this->belongsTo('App\User', 'employee_id');
    }

}
