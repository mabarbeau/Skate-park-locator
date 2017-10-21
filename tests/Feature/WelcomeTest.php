<?php

namespace Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WelcomeTest extends TestCase
{
    /**
     * Homepage returns a status code of 200
     *
     * @return void
     */
    public function testStatus()
    {
        $this
          ->get('/')
          ->assertStatus(200);
    }
}
