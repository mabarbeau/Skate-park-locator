<?php

namespace Tests\Tag;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ListTagTest extends TestCase
{
  /**
   * Test list tags for a given spot
   *
   * @dataProvider spotProvider
   *
   * @return void
   */
  public function testListTag(\App\Spot $spot)
  {
    $response = $this->get("/spots/$spot->slug/tags");

    $response->assertStatus(200);
  }
}
