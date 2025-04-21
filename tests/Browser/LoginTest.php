<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{

    public function test_user_can_login()
    {
        $this->browse(function (Browser $browser) {
            // Automatic Testing Login
                $browser 
                ->visit('/login') // mengunjungi halaman login
                ->type('email', 'duskuser@example.com') // mengisi email
                ->type('password', 'password') // mengisi password
                ->press('LOG IN') // menekan tombol login
                ->assertPathIs('/dashboard') // memastikan sudah masuk ke halaman dashboard
                ->press('Dusk User') // menekan nama user
                ->clickLink('Log Out'); // menekan tombol logout

                });
    }
}