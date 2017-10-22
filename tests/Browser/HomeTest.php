<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Tests\Browser\Pages\Home;
use Laravel\Dusk\Browser;

class HomeTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Home);
        });
    }
}
