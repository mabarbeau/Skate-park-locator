<?php

namespace Tests\Browser\Pages\Spots;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Edit extends BasePage
{
    protected $spot;

    /**
    * Construct Show page
    *
    * @return string
    */
    public function __construct($slug = null){
        if($slug){
            $this->spot = \App\Spot::select('slug')->where('slug', $slug)->firstOrFail();
        }else{
            $this->spot = \App\Spot::select('slug')->inRandomOrder()->first();
        }
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return "/spot/edit/" . $this->spot->slug;
    }

    /**
     * Assert edit page can modify a spot
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $new = factory(\App\Spot::class)->make();

        $browser
            ->assertPathIs($this->url())
            ->visit('/spots/' . $this->spot->slug . '/edit')
            ->type('slug', $new->slug)
            ->type('title', 'Test')
            ->type('description', $new->description)
            ->type('address', $new->address)
            ->type('locality', $new->locality)
            ->type('reagion', $new->reagion)
            ->type('postcode', $new->postcode)
            ->type('country', $new->country)
            ->type('map', $new->map)
            ->press('Submit')
            ->assertRouteIs('spots.show', ['slug' => $new->slug]);
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [];
    }
}
