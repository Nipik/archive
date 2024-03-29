<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TestNavigateur extends DuskTestCase
{
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('BIPOP');
            $browser->type('email', 'ping@gmail.com')
                    ->type('password', 'password123')
                    ->press('Login');
            $browser->waitForText('BIPOP')
                    ->assertSee('PING')
                    ->assertSee('User Profile')
                    ->assertSee('BIPOP');
            $browser->pause(2000)
                    ->screenshot('after_login');
        });
    }
}
