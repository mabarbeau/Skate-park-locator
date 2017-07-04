<?php

namespace Tests\Spot;

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
        ->get("api/spots/$spot->slug")
        ->assertJsonFragment([
          "slug" => $spot->slug,
          "title" => $spot->title
        ]);
  }
}
