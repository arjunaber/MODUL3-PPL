<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class ViewNoteTest extends DuskTestCase
{
    
    public function test_user_can_register_login_create_edit_view_delete_note_and_logout()
    {
        $this->browse(function (Browser $browser) {
            $browser
            ->visit('/login') // mengunjungi halaman login
            ->type('email', 'duskuser@example.com') // mengisi email
            ->type('password', 'password') // mengisi password
            ->press('LOG IN') // menekan tombol login
            ->assertPathIs('/dashboard') // memastikan sudah masuk ke halaman dashboard
            ->clickLink('Notes') // menekan tombol notes
            ->clickLink('Dusk Test Note Updated') // menekan judul note
            ->assertSee('Updated content by Dusk test.') // memastikan isi note sudah ada di halaman notes
            ->press('Dusk User') // menekan nama user
            ->clickLink('Log Out') // menekan tombol logout
            ->assertPathIs('/'); // memastikan sudah logout
        });
    }
}