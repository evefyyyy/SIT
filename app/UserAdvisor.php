<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAdvisor extends Model
{
    protected $table = 'user_advisor';
    
    public function advisor()
	{
		return $this->belongsTo('App\Advisor');
	}
}
