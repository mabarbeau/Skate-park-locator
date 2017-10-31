<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Tests\Browser\Pages\Spots\Create;
use Tests\Browser\Pages\Spots\Show;
use Tests\Browser\Pages\Spots\Index;
use Tests\Browser\Pages\Spots\Edit;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SpotsTest extends DuskTestCase
{
    /**
     * Test spot index page
     *
     * @return void
     */
    public function testIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(\App\User::role('admin')->firstOrFail())->visit(new Index);
        });
    }

    /**
     * Test spot create page
     *
     * @return void
     */
    public function testCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(\App\User::role('admin')->firstOrFail())->visit(new Create);
        });
    }

    /**
     * Test spot show page
     *
     * @return void
     */
    public function testShow()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Show);
        });
    }

    /**
     * Test spot edit page
     *
     * @return void
     */
    public function testEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(\App\User::role('admin')->firstOrFail())->visit(new Edit);
        });
    }
}
