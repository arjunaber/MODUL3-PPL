<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    

    public function test_user_can_register()
    {
        $this->browse(function (Browser $browser) {
            // Register
            $browser->visit('/register') //masuk ke halaman register
                ->type('name', 'Dusk User') //mengisi nama
                ->type('email', 'duskuser@example.com') //mengisi email
                ->type('password', 'password') //mengisi password
                ->type('password_confirmation', 'password') //mengisi konfirmasi password
                ->press('REGISTER') //menekan tombol register
                ->assertPathIs('/dashboard') //memastikan sudah masuk ke halaman dashboard
                ->press('Dusk User') //menekan nama user
                ->clickLink('Log Out'); //menekan tombol logout
        });
    }
}