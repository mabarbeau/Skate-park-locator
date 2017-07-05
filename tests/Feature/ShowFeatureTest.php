<?php

namespace Tests\Feature;

use Tests\TestCase;

class ShowFeatureTest extends TestCase
{
    /**
     * Test show feature
     *
     * @dataProvider featureProvider
     *
     * @return void
     */
    public function testShowFeature(\App\Feature $feature)
    {
        $spot = \App\Spot::select('slug')->where('id', $feature->spot_id)->firstOrFail();

        $response = $this->get("/spots/$spot->slug/features/$feature->index");

        $response->assertStatus(200);
    }
}
