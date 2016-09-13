<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = 'pictures';
    protected $fillable =
    [
        'picture_path_name',
        'project_pkid',
        'picture_type_id'
    ];

    public function groupProject()
    {
      return $this->belongsTo('App\GroupProject');
    }
}
