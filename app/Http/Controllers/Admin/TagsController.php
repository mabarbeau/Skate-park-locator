<?php

namespace App\Http\Controllers\Admin;

use Session;

use App\Http\Controllers\TagsController as BaseTagsController;

use App\Http\Requests\StoreTag;

class TagsController extends BaseTagsController
{
    /**
     * Display a listing of all tags for a single of spot
     *
     * @param App\Spot::$slug
     * @return \Illuminate\View\View
     */
    public function index($slug)
    {
        $tags = parent::index($slug);

        return view('tags.index',  ['slug' => $slug, 'tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param App\Spot::$slug
     * @return \Illuminate\View\View
     */
    public function create($slug)
    {
        $tag = parent::create($slug);

        return view('tags.create', ['slug' => $slug, 'tag' => $tag] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Spot::$slug
     * @param  App\Request\StoreTag $request
     * @return \Illuminate\Http\RedirectResponse
     */
     protected function store($slug, StoreTag $request)
     {
        $tag = parent::store($slug, $request);

        Session::flash('message', 'Tag successfully added!');

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
        $tag = parent::show($slug, $index);

        return view('tags.show', ['slug' => $slug, 'tag' => $tag] );
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
        $tag = parent::edit($slug, $index);

        return view('tags.edit', ['slug' => $slug, 'tag' => $tag] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @param  \Illuminate\Http\StoreTag  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($slug, $index, StoreTag $request)
    {
        $success = parent::update($slug, $index, $request);

        Session::flash('message', 'Tag successfully updated!');

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

        Session::flash('message', "Tag successfully deleted!");

        return redirect( route('spots.show',  ['slug' => $slug] ) );
    }
}
