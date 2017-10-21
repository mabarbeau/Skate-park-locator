<?php

namespace Tests\FeatureTag;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UpdateTagTest extends TestCase
{
  use DatabaseTransactions;
  /**
   * Update a random tag using factory
   *
   * @dataProvider tagFactoryProvider
   *
   * @param \App\Tag $newtag
   *
   * @return void
   */
  public function testCreateNewTag(\App\Tag $newtag)
  {
    $tag = \App\Tag::select('spot_id', 'index')->inRandomOrder()->firstOrFail();

    $spot = \App\Spot::select('slug')->where('id', $tag->spot_id)->firstOrFail();

    $response = $this->patch("/spots/$spot->slug/tags/$tag->index", $newtag->toArray());

    $response->assertStatus(302);

  }
}
