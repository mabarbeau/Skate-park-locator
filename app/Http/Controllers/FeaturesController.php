<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Spot;
use App\Feature;
use App\Http\Requests\StoreFeature;

class FeaturesController extends Controller
{
    /**
     * Display a listing of all features for a single of spot
     *
     * @param App\Spot::$slug
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();

        $features = Feature::where('spot_id', $spot->id)->get();

        return view('features.index',  ['slug' => $slug, 'features' => $features]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param App\Spot::$slug
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
     * @param App\Spot::$slug
     * @param  App\Request\StoreFeature $request
     * @return \Illuminate\Http\Response
     */
     protected function store($slug, StoreFeature $request)
     {
        $save = $request->all();

        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();
        $save['spot_id'] = $spot->id;

        $save['index'] = 1 + Feature::where('spot_id', $spot->id)->count();
        $save['creator_id'] = '1';
        $save['updater_id'] = '1';

        Feature::create($save);

        Session::flash('message', 'Feature successfully added!');

        return redirect( route('spots.show',  ['slug' => $slug] ) );
     }


    /**
     * Display the specified resource.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $index)
    {
        $feature = Feature::where(['index' => $index])->firstOrFail();

        return view('features.show', ['slug' => $slug, 'feature' => $feature] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $index)
    {
        $feature = Feature::where(['index' => $index])->firstOrFail();

        return view('features.edit', ['slug' => $slug, 'feature' => $feature] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @param  \Illuminate\Http\StoreFeature  $request
     * @return \Illuminate\Http\Response
     */
    public function update($slug, $index, StoreFeature $request)
    {
        $feature = Feature::where(['index' => $index])->firstOrFail();

        $feature['updater_id'] = 10;

        $feature->fill( $request->all() )->save();

        Session::flash('message', 'Feature successfully updated!');

        return redirect("features/$slug");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug ,$index)
    {
        $feature = Feature::findOrFail($index);

        $deletedRows = $feature->delete();

        Session::flash('message', "Feature successfully deleted!");

        return redirect('features');
    }
}
