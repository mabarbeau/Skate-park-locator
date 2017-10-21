<?php

namespace Tests\FeatureTag;

use Tests\TestCase;

class ShowTagTest extends TestCase
{
    /**
     * Test show tag
     *
     * @dataProvider tagProvider
     *
     * @return void
     */
    public function testShowTag(\App\Tag $tag)
    {
        $spot = \App\Spot::select('slug')->where('id', $tag->spot_id)->firstOrFail();

        $response = $this->get("/spots/$spot->slug/tags/$tag->index");

        $response->assertStatus(200);
    }
}
