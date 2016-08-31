<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
<<<<<<< HEAD
    protected $table = 'proposals';
    protected $fillable =
    [
      'proposal_path_name',
      'proposal_sourcode_path_name',
      'date'
    ];

    public function projectProposal()
    {
      return $this->hasMany('App\projectProposal','proposal_id');
    }

}
