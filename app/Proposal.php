<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = 'proposals';

    public function groupProject()
    {
      return $this->belongsTo('App\GroupProject');
    }
    public function proposalType()
    {
      return $this->belongsTo('App\ProposalType');

    }

}
