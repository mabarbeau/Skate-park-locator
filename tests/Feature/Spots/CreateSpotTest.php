<?php

namespace Tests\FeatureSpot;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;



class CreateSpotTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Create a new spot with api
     *
     * @dataProvider spotFactoryProvider
     *
     * @param \App\Spot $spot
     *
     * @return void
     */
    public function testCreate(\App\Spot $spot)
    {
        $user =  \App\User::inRandomOrder()->firstOrFail();

        $response = $this->actingAs($user)->json('POST', "/spots", $spot->toArray());

        $response->assertStatus(200);
    }
}
