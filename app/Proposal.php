<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = 'proposals';
    protected $fillable =
    [
      'proposal_path_name',
      'proposal_sourcecode_path_name'
    ];

    public function projectProposal()
    {
      return $this->hasOne('App\ProjectProposal','proposal_id');
    }

}
