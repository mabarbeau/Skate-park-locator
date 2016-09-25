<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Spots extends Controller
{
    protected function home()
    {
       return view('pages.spots', ['user' => 'User name']);
    }
}
