<?php
class CreateSpotTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRoute()
    {
      $this->visit('/spots/create')
            ->seeRouteIs('spots.create');
    }
}
