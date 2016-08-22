<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class studentProfile extends Model
{

	public static function select_Test(){
		
		return $users = studentProfile::select('select * from Student')->get();

	}
 	

}
