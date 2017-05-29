<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WelcomeTest extends BrowserKitTestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testWelcome()
    {
        $this->visit('/')
             ->see('Welcome');
    }
}
