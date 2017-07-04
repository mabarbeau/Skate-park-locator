<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateFeatureTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Create a feature for a random spot
     *
     * @dataProvider featureFactoryProvider
     *
     * @param \App\Feature $feature
     *
     * @return void
     */
    public function testCreateNewFeature(\App\Feature $feature)
    {
        $spot = \App\Spot::select('slug')->inRandomOrder()->firstOrFail();

        $response = $this->json('POST', "/spots/$spot->slug/features", $feature->toArray());

        $response->assertStatus(302);

    }
}
