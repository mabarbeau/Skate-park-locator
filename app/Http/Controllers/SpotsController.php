<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Spot;
use App\Backup;
use App\Http\Requests\StoreSpot;

class SpotsController extends Controller
{
  /**
   * Display a listing of the spots.
   *
   * @return \Illuminate\Http\Response
   */
    protected function index()
    {
      return view('spots.index', ['spots' => $spots = Spot::all() ]);
    }

    /**
     * Show the form for creating a new spots.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create()
    {
      $spot = new Spot;

      return view('spots.create', compact('spot'));
    }

    /**
     * Store a newly created spots in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function store(StoreSpot $request)
    {
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

      Session::flash('message', 'Spot successfully added!');

      return redirect('spots');
    }

    /**
     * Display the specified spots.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    protected function show($slug)
    {
      $spot = Spot::where('slug', $slug)->firstOrFail();

      return view('spots.show', compact('spot'));
    }

    /**
     * Show the form for editing the specified spots.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    protected function edit($slug)
    {
      $spot = Spot::where('slug', $slug)->firstOrFail();

      return view('spots.edit', compact('spot') );
    }

    /**
     * Update the specified spots in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSpot $request, $slug)
    {
      $spot = Spot::where('slug', $slug)->firstOrFail();

      $spot['updater_id'] = 10;

      $spot->fill( $request->all() )->save();

      Session::flash('message', 'Spot successfully updated!');

      return redirect("spots/$slug");
    }

    /**
     * Remove the specified spots from storage.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $spot = Spot::where('slug', $slug)->firstOrFail();

        Backup::create([
            'table' => 'spots',
            'data' => json_encode($spot),
        ]);

        $deletedRows = $spot->delete();

        Session::flash('message', 'Spot successfully deleted!');

        return redirect('spots');
    }

}
