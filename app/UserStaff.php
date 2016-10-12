<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStaff extends Model
{
    protected $table = 'user_staff';

    public function staff()
	{
		return $this->belongsTo('App\Staff');
	}
}
