<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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
           ->see('Create');
    }
}
