<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';

    public function user_type()
	{
		return $this->belongsTo('App\UserTypes', 'user_type_id');
	}
    
}
