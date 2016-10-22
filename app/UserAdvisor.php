<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAdvisor extends Model
{
    protected $table = 'user_advisor';

  //   public function advisor()
	// {
	// 	return $this->belongsTo('App\Advisor');
	// }

  public function username()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
	public function advisor()
	{
		return $this->belongsTo('App\Advisor', 'advisor_id');
	}
}
