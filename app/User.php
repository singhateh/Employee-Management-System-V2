<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','first_name', 'last_name', 'role', 'email',
        'password','phone','address','gender','dob','join_date',
        'job_type','city','salary','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//    For counting the leave
    public function leave()
    {
        return $this->HasMAny('App\Leave','employee_id');
    }

    public function salary()
    {
        return $this->HasMAny('App\Salary','employee_id');
    }

    public function skill()
    {
        return $this->HasMAny('App\Skill','employee_id');
    }

    public function designation()
    {
        return $this->HasMAny('App\Designation','employee_id');
    }

    public function get_UserNumber(){

        $this->db->select("count(*) as no");
        $query = $this->db->get("users");
        return $query->result();

    }
}
