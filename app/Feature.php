<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name',
    'description',
    'spot_id',
    'creator_id',
    'updater_id',
  ];

  public function spot()
  {
    return $this->belongsTo(Spot::class);
  }
}
