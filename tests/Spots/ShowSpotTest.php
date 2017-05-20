<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Spot;

class ShowSpotTest extends TestCase
{
    protected $spot;

    public function testRoute()
    {
        $spot = Spot::firstOrFail();
        $this->spot = $spot;
        $this->visit("/spots/$spot->slug")
              ->seeRouteIs('spots.show', ['spot' => $this->spot->slug ]);

        return $this;
    }

    public function testClickEdit()
    {
        $this->testRoute()
              ->click("Edit")
              ->seeRouteIs('spots.edit', ['spot' => $this->spot->slug ]);
    }
}
