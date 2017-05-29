<?php
use Illuminate\Foundation\Testing\DatabaseTransactions;


class CreateSpotTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    /**
     * Test spot create route
     *
     * @return void
     */
    public function testRoute()
    {
      $this->visit('/spots/create')
            ->seeRouteIs('spots.create');
    }

    /**
    * Test form can create a new spot
    *
    * @return void
    */
    public function testForm()
    {

        $spot = factory(App\Spot::class)->make();

        $this->visit('/spots/create')
            ->type($spot->slug, 'slug')
            ->type('Test', 'title')
            ->type($spot->description, 'description')
            ->type($spot->address, 'address')
            ->type($spot->locality, 'locality')
            ->type($spot->reagion, 'reagion')
            ->type($spot->postcode, 'postcode')
            ->type($spot->country, 'country')
            ->type($spot->map, 'map')
            ->press('Submit')
            ->seeRouteIs('spots.index');
    }

}
