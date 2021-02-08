<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use time ;
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
                    $today=now();
                    $browser->loginAs(User::find(1))
                    ->visit('/event/create')
                    ->type('name','TestEvent')
                    ->type('description', 'TestEvent-Description')
                    // Date 
                    ->type('date', '01-02-2017')
                    ->keys('#date', '{backspace}')
                    ->keys('#date', $date->format('d'))
                    ->keys('#date', '{backspace}')
                    ->keys('#date', $date->format('m'))
                    ->keys('#date', '{backspace}')
                    ->keys('#date', $date->format('Y'))
                    // Time 
                    ->type('location', 'jeddah')
                    // using dusk = "" on the select 
                    ->click('@dormen')
                    ->press('Login');

                });
    }
}
