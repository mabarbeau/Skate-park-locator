<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
  /**
  * The attributes that are not mass assignable.
  *
  * @var array
  */
  protected $guarded = [];

  public function spot()
  {
    return $this->belongsTo(Spot::class);
  }
}
