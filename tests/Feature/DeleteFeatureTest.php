<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeleteFeatureTest extends TestCase
{
  use DatabaseTransactions;
  /**
  * Test delete feature
  *
  * @param \App\Feature $feature
  *
  * @dataProvider featureProvider
  *
  * @return void
  */
  public function testDeleteFeature(\App\Feature $feature)
  {

    $spot = \App\Spot::select('slug')->where('id', $feature->spot_id)->firstOrFail();

    $response = $this->delete("/spots/$spot->slug/features/$feature->index");

    $response->assertStatus(302);
  }
}
