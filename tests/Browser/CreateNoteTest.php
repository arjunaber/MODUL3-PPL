<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class CreateNoteTest extends DuskTestCase
{

    public function test_user_can_create_note()
    {
        $this->browse(function (Browser $browser) {

            $browser
                ->visit('/login') // mengunjungi halaman login
                ->type('email', 'duskuser@example.com') // mengisi email
                ->type('password', 'password') // mengisi password
                ->press('LOG IN') // menekan tombol login
                ->assertPathIs('/dashboard') // memastikan sudah masuk ke halaman dashboard
                ->clickLink('Notes') // menekan tombol notes
                ->clickLink('Create Note') // menekan tombol create note
                ->assertPathIs('/create-note') // memastikan sudah masuk ke halaman create note
                ->type('title', 'Dusk Test Note') // mengisi title
                ->type('description', 'This is a note created by Laravel Dusk test.') // mengisi description
                ->press('CREATE') // menekan tombol create
                ->assertSee('Dusk Test Note') // memastikan title sudah ada di halaman notes
                ->press('Dusk User') // menekan nama user
                ->clickLink('Log Out') // menekan tombol logout
                ->assertPathIs('/'); // memastikan sudah logout
        });
    }
}