<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStudent extends Model
{
	protected $table = 'user_student';

	public function username()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
	public function student()
	{
		return $this->belongsTo('App\Student', 'student_pkid');
	}
}
