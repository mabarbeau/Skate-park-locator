<?php

namespace App\Http\Controllers\Admin;

use Session;

use App\Http\Controllers\FeaturesController as BaseFeaturesController;

use App\Http\Requests\StoreFeature;

class FeaturesController extends BaseFeaturesController
{
    /**
     * Display a listing of all features for a single of spot
     *
     * @param App\Spot::$slug
     * @return \Illuminate\View\View
     */
    public function index($slug)
    {
        $features = parent::index($slug);

        return view('features.index',  ['slug' => $slug, 'features' => $features]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param App\Spot::$slug
     * @return \Illuminate\View\View
     */
    public function create($slug)
    {
        $feature = parent::create($slug);

        return view('features.create', ['slug' => $slug, 'feature' => $feature] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Spot::$slug
     * @param  App\Request\StoreFeature $request
     * @return \Illuminate\Http\RedirectResponse
     */
     protected function store($slug, StoreFeature $request)
     {
        $feature = parent::store($slug, $request);

        Session::flash('message', 'Feature successfully added!');

        return redirect( route('spots.show',  ['slug' => $slug] ) );
     }


    /**
     * Display the specified resource.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @return \Illuminate\View\View
     */
    public function show($slug, $index)
    {
        $feature = parent::show($slug, $index);

        return view('features.show', ['slug' => $slug, 'feature' => $feature] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @return \Illuminate\View\View
     */
    public function edit($slug, $index)
    {
        $feature = parent::edit($slug, $index);

        return view('features.edit', ['slug' => $slug, 'feature' => $feature] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @param  \Illuminate\Http\StoreFeature  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($slug, $index, StoreFeature $request)
    {
        $success = parent::update($slug, $index, $request);

        Session::flash('message', 'Feature successfully updated!');

        return redirect( route('spots.show',  ['slug' => $slug] ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($slug, $index)
    {
        $deletedRows = parent::destroy($slug, $index);

        Session::flash('message', "Feature successfully deleted!");

        return redirect( route('spots.show',  ['slug' => $slug] ) );
    }
}
