<?php
use App\Spot;

class ShowSpotTest extends BrowserKitTestCase
{
    /**
    * Get slug from spot id
    *
    * @param $id
    *
    * @return $slug
    **/

    protected function getSlugFromId($id)
    {
        $spot = Spot::find($id);

        return $spot->slug;
    }


    /**
    * Provide test with random slugs from spots table
    *
    * @return $slug
    **/
    public function slugProvider()
    {
        $totalSpots = Spot::count();
        $test = [];

        for ($i=0; $i < 2; $i++)
        {
            $slug = self::getSlugFromId(mt_rand(1,$totalSpots));
            $test["Testing 'spots/$slug'"] = [$slug];
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
