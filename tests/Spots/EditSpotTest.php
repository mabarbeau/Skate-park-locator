<?php
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Spot;

class EditSpotTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    /**
    * Provide test with random slugs from spots table
    *
    * @return $slug
    **/
    public function slugProvider()
    {
        $spots = Spot::select('slug')->inRandomOrder()->take(3)->get();

        foreach ($spots as $spot)
        {
            $test["Testing '$spot->slug'"] = [$spot->slug];
        }

        return $test;
    }

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
