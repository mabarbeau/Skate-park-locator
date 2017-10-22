<?php

namespace Tests\Browser\Pages\Spots;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Create extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/spots/create/';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $spot = factory(\App\Spot::class)->make();

        $browser
            ->assertPathIs($this->url())
            ->type('slug', $spot->slug)
            ->type('title', 'Test')
            ->type('description', $spot->description)
            ->type('address', $spot->address)
            ->type('locality', $spot->locality)
            ->type('reagion', $spot->reagion)
            ->type('postcode', $spot->postcode)
            ->type('country', $spot->country)
            ->type('map', $spot->map)
            ->press('Submit')
            ->assertRouteIs('spots.show', ['slug' => $spot->slug]);
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
