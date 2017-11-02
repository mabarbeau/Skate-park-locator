<?php

namespace Tests\Feature\Tags;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeleteTagTest extends TestCase
{
  use DatabaseTransactions;
  /**
  * Test delete tag
  *
  * @param \App\Tag $tag
  *
  * @dataProvider tagProvider
  *
  * @return void
  */
  public function testDeleteTag(\App\Tag $tag)
  {

    $spot = \App\Spot::select('slug')->where('id', $tag->spot_id)->firstOrFail();
    $user = \App\User::permission('delete')->firstOrFail();

    $response = $this->actingAs($user)->delete("/spots/$spot->slug/tags/$tag->index");

    $response->assertStatus(302);
  }
}
