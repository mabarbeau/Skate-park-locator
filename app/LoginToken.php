<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginToken extends Model
{
  /**
  * The attributes that are not mass assignable.
  *
  * @var array
  */
  protected $guarded = [];

  /**
 * Get the route key for the model.
 *
 * @return string
 */
  public function getRouteKeyName()
  {
      return 'value';
  }

  public function user()
  {
    return $this->hasOne('App\User','id','user_id');

  }

}
