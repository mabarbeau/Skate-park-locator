<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
  /**
   * Instantiate a new ResourceController
   */
  public function __construct()
  {
    parent::__construct();
    $this->middleware('auth')->except(['index','show']);
    $this->middleware(['permission:update'])->only(['edit','update']);
    $this->middleware(['permission:delete'])->only(['delete']);
  }
}
