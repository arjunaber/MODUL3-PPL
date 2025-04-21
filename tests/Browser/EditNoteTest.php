<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class EditNoteTest extends DuskTestCase
{

    public function test_user_can_edit_note()
    {
        $this->browse(function (Browser $browser) {

            $browser
                ->visit('/login') // mengunjungi halaman login
                ->type('email', 'duskuser@example.com') // mengisi email
                ->type('password', 'password') // mengisi password
                ->press('LOG IN') // menekan tombol login
                ->assertPathIs('/dashboard') // memastikan sudah masuk ke halaman dashboard
                ->clickLink('Notes') // menekan tombol notes
                ->clickLink('Edit') // menekan tombol edit
                ->assertPathBeginsWith('/edit-note-page/') // memastikan sudah masuk ke halaman edit note
                ->type('title', 'Dusk Test Note Updated') // mengisi title
                ->type('description', 'Updated content by Dusk test.') // mengisi description
                ->press('UPDATE') // menekan tombol update
                ->assertPathIs('/notes') // redirect ke notes
                ->press('Dusk User') // menekan nama user
                ->clickLink('Log Out') // menekan tombol logout
                ->assertPathIs('/'); // memastikan sudah logout
        });
    }
}