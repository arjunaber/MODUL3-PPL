<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            // Automatic Testing Register
            $browser->visit('http://127.0.0.1:8000/register') // mengunjungi halaman register
                ->type('name', 'arjuna') // mengisi nama
                ->type('email', 'arjunaaber2@gmail.com') // megnisi email dan mengecek jika email sudah terdaftar
                ->type('password', 'password') // mengisi password
                ->type('password_confirmation', 'password') // mengisi konfirmasi password
                ->press('REGISTER'); // Click register button
        }); 
    }
}