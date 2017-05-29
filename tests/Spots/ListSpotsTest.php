<?php
class ListSpotsTest extends BrowserKitTestCase
{
    /**
     * Check route is spots index
     *
     * @return void
     */
     public function testRoute()
     {
         $this->visit('/spots')
              ->seeRouteIs('spots.index');
     }
    /**
     * Navigate from spots index to create spot
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
