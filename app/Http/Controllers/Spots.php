<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Spot;

class Spots extends Controller
{
    protected function index()
    {
      $spots = Spot::all();

      return view('pages.spots.index', compact('spots'));
    }

    protected function show($slug)
    {
      $spot = Spot::where('slug', $slug)->firstOrFail();

      return view('pages.spots.show', compact('spot'));
    }

    protected function create()
    {
      return view('pages.spots.create');
    }

    protected function store(Request $request)
    {
      $input = $request->all();
      $input['votes'] = 0;
      $input['hearts']= 0;
      $input['rating'] = null;
      $input['creator_id'] = 1;
      $input['updater_id'] = 10;

      // var_dump($input);

      Spot::create($input);

      return redirect('spots');
    }
}
