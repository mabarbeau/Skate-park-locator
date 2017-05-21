<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
  public $timestamps = false;

  protected $guarded = [
    'id', 'deleted_at',
  ];
}
