<?php

namespace Tests\Feature\Controller\Admin;

use App\Models\Sondage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SondageControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $this->admin = User::all()->first();
    }

    public function test_index()
    {
        Sondage::factory()->count(20)->create();
        $response = $this->actingAs($this->admin)
            ->get(route('admin.sondage.index'));

        $response->assertStatus(200)
            ->assertViewIs('pages.admin.sondage.index');
    }

    public function test_create()
    {
        $response = $this->actingAs($this->admin)
            ->get(route('admin.sondage.create'));

        $response->assertStatus(200)
            ->assertViewIs('pages.admin.sondage.create');
    }

    public function test_store()
    {
        $_libelle = $this->faker->sentence;
        $_description = $this->faker->optional->sentence;

        $response = $this->actingAs($this->admin)
            ->post(route('admin.sondage.store'), [
                'libelle' => $_libelle,
                'description' => $_description
            ]);

        $response->assertStatus(302)
            ->assertRedirect(route('admin.sondage.index'));

        $this->assertDatabaseHas('sondages', [
            'libelle' => $_libelle,
            'description' => $_description
        ]);
    }
}
