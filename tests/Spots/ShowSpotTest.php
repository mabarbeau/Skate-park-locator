<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Spot;

class ShowSpotTest extends TestCase
{
    protected function getSlug($id)
    {
        $spot = Spot::find($id);
        return $spot->slug;
    }

    public function additionProvider()
    {
        return [
            [1],
            [2],
            [3],
        ];
    }

    /**
    * @param $id
    *
    * @dataProvider additionProvider
    */
    public function testRoute($id)
    {
        $slug = self::getSlug($id);
        $this->visit("/spots/$slug")
              ->seeRouteIs('spots.show', ['spot' => $slug ]);
    }

    /**
    * @param $id
    *
    * @dataProvider additionProvider
    */
    public function testClickEdit($id)
    {
        $slug = self::getSlug($id);
        $this->visit("/spots/$slug")
              ->click("Edit")
              ->seeRouteIs('spots.edit', ['spot' => $slug ]);
    }
}
