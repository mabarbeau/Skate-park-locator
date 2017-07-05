<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ListFeatureTest extends TestCase
{
  /**
   * Test list features for a given spot
   *
   * @dataProvider spotProvider
   *
   * @return void
   */
  public function testListFeature(\App\Spot $spot)
  {
    $response = $this->get("/spots/$spot->slug/features");

    $response->assertStatus(200);
  }
}
