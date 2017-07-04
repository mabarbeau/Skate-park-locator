<?php

namespace Tests\Spot;

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
    public function testCreateNewSpotWithApi(\App\Spot $spot)
    {
        $response = $this->json('POST', "/api/spots", $spot->toArray());

        $response->assertStatus(200);
    }
}
