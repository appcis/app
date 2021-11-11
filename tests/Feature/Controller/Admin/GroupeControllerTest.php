<?php

namespace Tests\Feature\Controller\Admin;

use App\Models\Groupe;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupeControllerTest extends TestCase
{
    use RefreshDatabase;

    private $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $this->admin = User::all()->first();
    }

    public function test_edit_route()
    {
        $groupe = Groupe::factory()->create();

        $res = $this->actingAs($this->admin)
            ->get(route('admin.groupe.edit', $groupe));

        $res->assertStatus(200);
    }
}
