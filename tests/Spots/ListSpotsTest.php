<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ListSpotsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     public function testNavigateToCreateSpotPage()
     {
         $this->visit('/spots')
              ->click('Create new')
              ->seePageIs('/spots/create');
     }
}
