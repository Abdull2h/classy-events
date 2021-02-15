<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EmailTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->type('name','ahmad abulaban')
            ->type('email', 'ahmad!8laban@gmial.com')
            ->type('subject', 'loremlorememsum')
            ->type('message', 'loremlorememsumloremlorememsumloremlorememsum')
            ->press('Send Email')
            ->assertPathIs('/wellcome');
        });
    }
}
