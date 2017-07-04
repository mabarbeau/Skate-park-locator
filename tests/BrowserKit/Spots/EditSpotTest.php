<?php
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Spot;

class EditSpotTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    /**
     * Test spot edit route
     *
     * @param $slug
     *
     * @dataProvider slugProvider
     *
     * @return void
     */
    public function testRoute($slug)
    {
      $this->visit('/spots/' . $slug . '/edit')
            ->seeRouteIs('spots.edit', ['slug'=> $slug]);
    }

    /**
    * Test form can edit a new spot
    *
    * @param $slug
    *
    * @dataProvider slugProvider
    *
    * @return void
    */
    public function testForm($slug)
    {
        $spot = factory(Spot::class)->make();

        $this->visit('/spots/' . $slug . '/edit')
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
            ->seeRouteIs('spots.show', ['slug' => $spot->slug]);
    }

}
