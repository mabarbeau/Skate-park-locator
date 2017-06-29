<?php
use App\Spot;

class ShowSpotTest extends BrowserKitTestCase
{
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
    * Check route is spots show
    *
    * @param $slug
    *
    * @dataProvider slugProvider
    *
    * @return void
    */
    public function testRoute($slug)
    {
        $this->visit("/spots/$slug")
              ->seeRouteIs('spots.show', ['spot' => $slug ]);
    }

    /**
    * Navigate to edit page
    *
    * @param $slug
    *
    * @dataProvider slugProvider
    *
    * @return void
    */
    public function testClickEdit($slug)
    {
        $this->visit("/spots/$slug")
              ->click("Edit")
              ->seeRouteIs('spots.edit', ['spot' => $slug ]);
    }
}
