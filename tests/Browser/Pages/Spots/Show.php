<?php

namespace Tests\Browser\Pages\Spots;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Show extends BasePage
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
        return "/spots/" . $this->spot->slug;
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser
          ->assertPathIs($this->url())
          ->assertRouteIs('spots.show', ['slug' => $this->spot->slug])
          ->clickLink('Edit')
          ->assertRouteIs('spots.edit', ['slug' => $this->spot->slug]);
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
