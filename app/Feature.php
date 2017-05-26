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
    'index',
    'description',
    'spot_id',
    'creator_id',
    'updater_id',
    'lat',
    'lng',
  ];

  public function spot()
  {
    return $this->belongsTo(Spot::class);
  }
}
