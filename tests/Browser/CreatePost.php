<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreatePost extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
                    $browser->loginAs(User::find(1))
                    ->visit('/event/create')
                    ->type('name','TestEvent')
                    ->type('description', 'TestEvent-Description')
                    // Date 
                    // Time 
                    ->type('location', 'jeddah')
                    // using dusk = "" on the select 
                    ->click('@dormen')
                    ->press('Login');

                });
    }
}
