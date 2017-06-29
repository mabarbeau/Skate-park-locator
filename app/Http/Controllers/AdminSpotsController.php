<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests\StoreSpot;
use App\Http\Controllers\SpotsController;

class AdminSpotsController extends SpotsController
{
    /**
     * Display a listing of the spots.
     *
     * @return \Illuminate\View
     */
    protected function index()
    {
        $spots = parent::index();

        return view('spots.index', $spots);
    }

    /**
     * Show the form for creating a new spot.
     *
     * @return \Illuminate\View
     */
    protected function create()
    {
        $spot = parent::create();

        return view( 'spots.create', compact('spot') );
    }

    /**
     * Store a newly created spot in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function store(StoreSpot $request)
    {
        $spot = parent::store($request);

        Session::flash('message', 'Spot successfully added!');

        return redirect("spots/$spot->slug");
    }

    /**
     * Display the specified spot.
     *
     * @param  int  $slug
     * @return \Illuminate\View
     */
    protected function show($slug)
    {
        $spot = parent::show($slug);

        return view( 'spots.show', compact('spot') );
    }

    /**
     * Show the form for editing the specified spot.
     *
     * @param  int  $slug
     * @return \Illuminate\View
     */
    protected function edit($slug)
    {
        $spot = parent::edit($slug);

        return view( 'spots.edit', compact('spot') );
    }

    /**
     * Update the specified spot in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreSpot $request, $slug)
    {
        $spot = parent::update($request, $slug);

        Session::flash('message', 'Spot successfully updated!');

        return redirect("spots/$spot->slug");
    }

    /**
     * Remove the specified spot from storage.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($slug)
    {
        $deletedRows = parent::destroy($slug);

        Session::flash('message', 'Spot successfully deleted!');

        return redirect('spots');
    }

}
