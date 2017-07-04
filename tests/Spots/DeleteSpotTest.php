<?php

namespace Tests\Spot;

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
        $response = $this->delete("/spots/$spot->slug");

        $response->assertStatus(302);
    }

}
