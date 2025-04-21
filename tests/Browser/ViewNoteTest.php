<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewNoteTest extends DuskTestCase
{
    use DatabaseMigrations;
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            // View Note Detail
            $browser->visit('/notes') // mengunjungi halaman notes
                ->clickLink('Dusk Test Note') // klik link note
                ->assertSee('Dusk Test Note') // check jika note detail muncul
                ->assertSee('This is a test note created for Dusk testing.'); // check isi note
        });
    }
}