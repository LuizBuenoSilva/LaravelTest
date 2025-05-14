<?php

namespace Tests\Feature;

use App\Models\Entry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EntryControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_entry_index_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('entries.index');
    }

    /** @test */
    public function it_can_store_a_new_entry()
    {
        $response = $this->post(route('entries.store'), [
            'full_name' => 'Luiz Henrique',
        ]);

        $response->assertRedirect(route('entries.index'));
        $this->assertDatabaseHas('entries', ['full_name' => 'Luiz Henrique']);
    }

    /** @test */
    public function it_can_export_excel_file()
    {
        $response = $this->post(route('export.excel'));

        $response->assertStatus(200);
        $response->assertHeader('Content-Disposition', 'attachment; filename=entries.xlsx');
    }
}
