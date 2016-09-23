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
     'name',
     'title',
     'description',
     'address',
     'locality',
     'reagion',
     'postcode',
     'country',
     'lat',
     'lng',
     'votes',
     'hearts',
     'rating',
     'creator_id',
     'updater_id',
   ];

   /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  //  protected $hidden = [
  //    '',
  //  ];
}
