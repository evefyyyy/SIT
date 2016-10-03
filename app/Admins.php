<?php

namespace App;

use Illuminate\Foundation\Auth\Admins as Authenticatable;

class Admins extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['admin_username','admin_password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
    public function advisor()
  {
    return $this->belongsTo('App\Advisor', 'advisor_id');
  }
}
