<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = [
     'slug',
     'name',
     'title',
     'description',
     'address',
     'locality',
     'reagion',
     'postcode',
     'country',
     'map',
     'votes',
     'hearts',
     'rating',
     'creator_id',
     'updater_id',
   ];

  public function features()
  {
    return $this->hasMany(Feature::class);
  }
}
