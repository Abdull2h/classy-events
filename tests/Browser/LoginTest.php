<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_basic_example()
    {
        $user = User::find(1);

        $this->browse(function ($browser) use ($user) {
            // $browser->screenshot('filename');
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'xenel123')
                    ->press('Login')
                    ->assertPathIs('/host');
                    // $browser->screenshot('after_login');
                    $browser->maximize();
        });
    }
    // public function testExample()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->loginAs(User::find(1))
    //         ->visit('/host');
    //     });
        
    // }

    
}