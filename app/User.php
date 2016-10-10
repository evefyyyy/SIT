<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'remember_token',
    ];
    public function user_student()
    {
        return $this->hasOne('App\UserStudent', 'user_id');
    }
    public function user_advisor()
    {
        return $this->hasMany('App\UserAdvisor');
    }
    public function user_staff()
    {
        return $this->hasMany('App\UserStaff');
    }
}
