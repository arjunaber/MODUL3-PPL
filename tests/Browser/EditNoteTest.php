<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
              // Mengedit Note
              $browser->clickLink('Edit') // klik link edit
              ->assertPathBeginsWith('/notes/') // check jika redirect ke halaman edit note
              ->type('title', 'Dusk Test Note Updated') // mengisi title dan mengecek jika title sudah terdaftar
              ->type('content', 'Updated content by Dusk test.') // mengisi content
              ->press('Update') // klik update button
              ->assertPathIs('/notes') // check jika redirect ke halaman notes
              ->assertSee('Dusk Test Note Updated'); // check jika note sudah terdaftar

        });
    }
}