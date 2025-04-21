<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            // Membuat Note
            $browser->visit('/create-notes') // mengunjungi halaman create note
                ->type('title', 'Dusk Test Note') // mengisi title dan mengecek jika title sudah terdaftar
                ->type('content', 'This is a note created by Laravel Dusk test.') // mengisi content
                ->press('Save') // klik save button
                ->assertPathIs('/notes') // check jika redirect ke halaman notes
                ->assertSee('Dusk Test Note'); // check jika note sudah terdaftar
        });
    }
}