<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UpdateFeatureTest extends TestCase
{
  use DatabaseTransactions;
  /**
   * Update a random feature using factory
   *
   * @dataProvider featureFactoryProvider
   *
   * @param \App\Feature $newfeature
   *
   * @return void
   */
  public function testCreateNewFeature(\App\Feature $newfeature)
  {
    $feature = \App\Feature::select('spot_id', 'index')->inRandomOrder()->firstOrFail();

    $spot = \App\Spot::select('slug')->where('id', $feature->spot_id)->firstOrFail();

    $response = $this->patch("/spots/$spot->slug/features/$feature->index", $newfeature->toArray());

    $response->assertStatus(302);

  }
}
