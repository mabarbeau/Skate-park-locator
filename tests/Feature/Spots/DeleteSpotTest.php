<?php

namespace Tests\FeatureSpot;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeleteSpotTest extends TestCase
{
    use DatabaseTransactions;
    /**
    *
    *
    * @param $spot
    *
    * @dataProvider spotProvider
    *
    * @return void
    */
    public function testApplication(\App\Spot $spot)
    {
        $user = \App\User::permission('delete')->firstOrFail();

        $response = $this->actingAs($user)->delete("/spots/$spot->slug");

        $response->assertStatus(302);
    }

}
