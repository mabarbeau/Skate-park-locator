<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{

  protected $hidden = ['id'];

  protected $guarded = [
    'id'
  ];

  public function features()
  {
    return $this->hasMany(Feature::class);
  }
  /**
 * Get the route key for the model.
 *
 * @return string
 */
  public function getRouteKeyName()
  {
      return 'slug';
  }
}
