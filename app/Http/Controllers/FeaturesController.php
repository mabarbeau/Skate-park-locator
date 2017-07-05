<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Spot;
use App\Feature;
use App\Http\Requests\StoreFeature;

class FeaturesController extends Controller
{
    /**
     * Instantiate a new FeaturesController instance with Cross-origin resource sharing (CORS) middleware
     */
    public function __construct()
    {
        $this->middleware('cors');
    }

    /**
     * Return a collection list of features for spot with provided slug
     *
     * @param App\Spot::$slug
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index($slug)
    {
        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();

        return Feature::where('spot_id', $spot->id)->get();
    }

    /**
     * Return a new instance of App\Feature
     *
     * @param App\Spot::$slug
     * @return App\Feature
     */
    public function create($slug)
    {
        return new Feature;
    }

    /**
     * Store a newly created feature in storage.
     *
     * @param App\Spot::$slug
     * @param  App\Request\StoreFeature $request
     * @return App\Feature
     */
     protected function store($slug, StoreFeature $request)
     {
        $save = $request->all();

        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();
        $save['spot_id'] = $spot->id;

        $save['index'] = 1 + Feature::where('spot_id', $spot->id)->count();
        $save['creator_id'] = '1';
        $save['updater_id'] = '1';

        return Feature::create($save);
     }


    /**
     * Display the specified feature.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @return App\Feature
     */
    public function show($slug, $index)
    {
        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();

        return Feature::where(['spot_id' => $spot->id ,'index' => $index])->firstOrFail();
    }

    /**
     * Display the specified feature.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @return App\Feature
     */
    public function edit($slug, $index)
    {
        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();

        return Feature::where(['spot_id' => $spot->id ,'index' => $index])->firstOrFail();

    }

    /**
     * Update the specified feature in storage.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @param  \Illuminate\Http\StoreFeature  $request
     * @return bool
     */
    public function update($slug, $index, StoreFeature $request)
    {
        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();

        $feature = Feature::where(['spot_id' => $spot->id ,'index' => $index])->firstOrFail();

        $feature['updater_id'] = 10;

        return $feature->fill( $request->all() )->save();
    }

    /**
     * Remove the specified feature from storage.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @return int $deletedRows
     */
    public function destroy($slug, $index)
    {
        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();

        $feature = Feature::where(['spot_id' => $spot->id ,'index' => $index])->firstOrFail();

        return $feature->delete();
    }
}
