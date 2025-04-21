<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
             // Delete Note
             $browser->visit('/notes') // mengunjungi halaman notes
             ->press('Delete') // klik delete button
             ->assertDontSee('Dusk Test Note Updated'); // check jika note sudah terhapus
        });
    }
}