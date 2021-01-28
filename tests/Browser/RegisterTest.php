<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Admin;
use App\Models\Host;
use App\Models\Doorman;
class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    // public function test_basic_example()
    // {
    //     // select('role','Host')
    //     $this->browse(function (Browser $browser) {
    //         // $browser->screenshot('filename');
    //         $browser->visit('/register')
    //                 ->click('@host')
    //                 ->type('name','ahmadLaban')
    //                 ->type('email', 'test_ahmad@gmail.com')
    //                 ->type('password', 'xenel123')
    //                 ->type('password_confirmation', 'xenel123')
    //                 ->check('cb')
    //                 ->press('Register')
    //                 ->assertPathIs('/home');
    //                 $browser->screenshot('after_reg');
                    
    //     });
    // }
}
