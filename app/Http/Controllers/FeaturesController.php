<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Spot;
use App\Feature;

class FeaturesController extends Controller
{
    /**
     * Display a listing of all features for a single of spot
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();

        $features = Feature::where('spot_id', $spot->id)->get();

        return view('features.index', ['features' => $features ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $feature = new Feature;

        return view('features.create', ['slug' => $slug, 'feature' => $feature] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     protected function store(StoreFeature $request)
     {
       $save = $request->all();

       Feature::create($save);

       Session::flash('message', 'Feature successfully added!');

       return redirect('features');
     }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {
        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();

        $features = Feature::where('spot_id', $spot->id)->get();

        return view('features.show', ['slug' => $slug, 'feature' => $feature] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $id)
    {
        $feature = Feature::find($id)->firstOrFail();

        return view('features.edit', ['slug' => $slug, 'feature' => $feature] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feature = Feature::find($id)->firstOrFail();

        $feature['updater_id'] = 10;

        $feature->fill( $request->all() )->save();

        Session::flash('message', 'Feature successfully updated!');

        return redirect("features/$slug");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = Feature::findOrFail($id);

        $deletedRows = $feature->delete();

        Session::flash('message', "Feature successfully deleted!");

        return redirect('features');
    }
}
