<?php

namespace Tests\Browser\Pages\Spots;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Index extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/spots/';
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
            ->assertRouteIs('spots.index')
            ->clickLink('Create new')
            ->assertRouteIs('spots.create');
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
