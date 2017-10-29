<?php

namespace Tests\FeatureSpot;

use Tests\TestCase;

use \App\Spot;

class testShowSpot extends TestCase
{

  /**
  *
  *
  * @param $spot
  *
  * @dataProvider spotProvider
  *
  * @return void
  */
  public function testShowSpotApiResponce(Spot $spot)
  {
      $this
        ->actingAs(\App\User::find(1))
        ->get("api/spots/$spot->slug")
        ->assertJsonFragment([
          "slug" => $spot->slug,
          "title" => $spot->title
        ]);
  }
}
