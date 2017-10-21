<?php

namespace Tests\FeatureTag;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateTagTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Create a tag for a random spot
     *
     * @dataProvider tagFactoryProvider
     *
     * @param \App\Tag $tag
     *
     * @return void
     */
    public function testCreateNewTag(\App\Tag $tag)
    {
        $spot = \App\Spot::select('slug')->inRandomOrder()->firstOrFail();

        $response = $this->json('POST', "/spots/$spot->slug/tags", $tag->toArray());

        $response->assertStatus(302);

    }
}
