<?php
use App\Spot;

class ShowSpotTest extends BrowserKitTestCase
{
    /**
    *
    *
    * @param $spot
    *
    * @dataProvider slugProvider
    *
    * @return void
    */
    public function testSpotApiResponce($slug)
    {
        $response = $this->call('GET', "/api/spots/$slug");

        $this->assertEquals(200, $response->status());
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

    /**
    * Test bad slug responce code is 404
    *
    * @return void
    */
    public function testBadSlugGives404Error()
    {
        $response = $this->call('GET', '/spots/fake' . mt_rand(0, 1000000000) );

        $this->assertEquals(404, $response->status());
    }

}
