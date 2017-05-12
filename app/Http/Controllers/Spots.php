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

      return view('spots.index', compact('spots'));
    }

    protected function show($slug)
    {
      $spot = Spot::where('slug', $slug)->firstOrFail();

      return view('spots.show', compact('spot'));
    }

    protected function create()
    {
      $spot = new Spot;
      
      return view('spots.edit', compact('spot'));
    }
    protected function edit($slug)
    {
      $spot = Spot::where('slug', $slug)->firstOrFail();

      return view('spots.edit', compact('spot') );
    }

    protected function store(Request $request)
    {
      $this->validate($request, [
        'slug'=> 'required|unique:spots|max:255',
        'title'=> 'required',
        'description'=> 'required',
        'address'=> 'required',
        'locality'=> 'required',
        'reagion'=> 'required',
        // 'postcode'=> '',
        'country'=> 'required',
        'lat'=> 'required',
        'lng'=> 'required'
      ]);

      $save = $request->all();

      // Hardcoded defaults
      $save['votes'] = 0;
      $save['hearts']= 0;
      $save['rating'] = null;

      //TODO: Get creator id
      $save['creator_id'] = 1;

      $save['updater_id'] = 10;
      // var_dump($save);

      Spot::create($save);

      return redirect('spots');
    }
}
