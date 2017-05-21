<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Spot;

class ShowSpotTest extends TestCase
{
    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->createApplication();
    }

    protected function getSlugFromId($id)
    {
        $spot = Spot::find($id);

        return $spot->slug;
    }

    public function additionProvider()
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
    * @param $slug
    *
    * @dataProvider additionProvider
    */
    public function testRoute($slug)
    {
        $this->visit("/spots/$slug")
              ->seeRouteIs('spots.show', ['spot' => $slug ]);
    }

    /**
    * @param $slug
    *
    * @dataProvider additionProvider
    */
    public function testClickEdit($slug)
    {
        $this->visit("/spots/$slug")
              ->click("Edit")
              ->seeRouteIs('spots.edit', ['spot' => $slug ]);
    }
}
