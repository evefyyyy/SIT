<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
  protected $table = 'advisors';

  public function user_type()
	{
		return $this->belongsTo('App\UserTypes', 'user_type_id');
	}

}
