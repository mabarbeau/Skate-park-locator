<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Spot;
use App\Tag;
use App\Http\Requests\StoreTag;

class TagsController extends Controller
{
    /**
     * Instantiate a new TagsController instance with Cross-origin resource sharing (CORS) middleware
     */
    public function __construct()
    {
        $this->middleware('cors');
    }

    /**
     * Return a collection list of tags for spot with provided slug
     *
     * @param App\Spot::$slug
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index($slug)
    {
        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();

        return Tag::where('spot_id', $spot->id)->get();
    }

    /**
     * Return a new instance of App\Tag
     *
     * @param App\Spot::$slug
     * @return App\Tag
     */
    public function create($slug)
    {
        return new Tag;
    }

    /**
     * Store a newly created tag in storage.
     *
     * @param App\Spot::$slug
     * @param  App\Request\StoreTag $request
     * @return App\Tag
     */
     protected function store($slug, StoreTag $request)
     {
        $save = $request->all();

        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();
        $save['spot_id'] = $spot->id;

        $save['index'] = 1 + Tag::where('spot_id', $spot->id)->count();

        return Tag::create($save);
     }


    /**
     * Display the specified tag.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @return App\Tag
     */
    public function show($slug, $index)
    {
        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();

        return Tag::where(['spot_id' => $spot->id ,'index' => $index])->firstOrFail();
    }

    /**
     * Display the specified tag.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @return App\Tag
     */
    public function edit($slug, $index)
    {
        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();

        return Tag::where(['spot_id' => $spot->id ,'index' => $index])->firstOrFail();

    }

    /**
     * Update the specified tag in storage.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @param  \Illuminate\Http\StoreTag  $request
     * @return bool
     */
    public function update($slug, $index, StoreTag $request)
    {
        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();

        $tag = Tag::where(['spot_id' => $spot->id ,'index' => $index])->firstOrFail();

        return $tag->fill( $request->all() )->save();
    }

    /**
     * Remove the specified tag from storage.
     *
     * @param App\Spot::$slug
     * @param  int  $index
     * @return int $deletedRows
     */
    public function destroy($slug, $index)
    {
        $spot = Spot::select('id')->where('slug', $slug)->firstOrFail();

        $tag = Tag::where(['spot_id' => $spot->id ,'index' => $index])->firstOrFail();

        return $tag->delete();
    }
}
