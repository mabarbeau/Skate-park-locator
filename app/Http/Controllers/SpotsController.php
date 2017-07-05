<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Spot;
use App\Backup;
use App\Http\Requests\StoreSpot;

class SpotsController extends Controller
{
    /**
     * Instantiate a new SpotsController instance with Cross-origin resource sharing (CORS) middleware
     */
    public function __construct()
    {
        $this->middleware('cors');
    }


    /**
     * Return a paginated list of spots
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    protected function index()
    {
      return ['spots' => Spot::select(['title','slug'])->paginate() ];
    }

    /**
     * Return a new instance of App\Spot.
     *
     * @return App\Spot
     */
    protected function create()
    {
        return new Spot;
    }

    /**
     * Store a newly created spot in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @return App\Spot
     */
    protected function store(StoreSpot $request)
    {
        $save = $request->all();

        // Hardcoded defaults
        $save['rating'] = null;

        //TODO: Get creator id
        $save['creator_id'] = 1;
        $save['updater_id'] = 10;

        return Spot::create($save);
    }

    /**
     * Display the specified spot.
     *
     * @param  string $slug
     * @return App\Spot
     */
    protected function show($slug)
    {
      return Spot::where('slug', $slug)->firstOrFail();
    }

    /**
     * Display the specified spot.
     *
     * @param  string $slug
     * @return App\Spot
     */
    protected function edit($slug)
    {
      return Spot::where('slug', $slug)->firstOrFail();
    }

    /**
     * Update the specified spot in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  string $slug
     * @return App\Spot
     */
    public function update(StoreSpot $request, $slug)
    {
      $spot = Spot::where('slug', $slug)->firstOrFail();

      $spot['updater_id'] = 10;

      $spot->fill( $request->all() )->save();

      return $spot;
    }

    /**
     * Remove the specified spot from storage.
     *
     * @param  string $slug
     * @return Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $spot = Spot::where('slug', $slug)->firstOrFail();

        Backup::create([
            'table' => 'spots',
            'data' => json_encode($spot),
        ]);

        return $spot->delete();
    }

}
