<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
         // Login
         $browser->visit('http://127.0.0.1:8000/login') // mengunjungi halaman login
         ->assertSee('Login') // check jika halaman login
         ->type('email', 'duskuser@example.com')// mengisi email 
         ->type('password', 'password') // mengisi password
         ->press('Log in') // klik login button
         ->assertPathIs('/dashboard'); // check jika redirect ke dashboard
        });
    }
}