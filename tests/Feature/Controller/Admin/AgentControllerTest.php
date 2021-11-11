<?php

namespace Tests\Feature\Controller\Admin;

use App\Models\Agent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AgentControllerTest extends TestCase
{
    use RefreshDatabase;

    private $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $this->admin = User::all()->first();
    }

    public function test_index_route_empty_agent()
    {
        $res = $this->actingAs($this->admin)
            ->get(route('admin.agent.index'));
        $res->assertStatus(200);
    }

    public function test_index_route()
    {
        Agent::factory()->count(50)->create();

        $res = $this->actingAs($this->admin)
            ->get(route('admin.agent.index'));
        $res->assertStatus(200);
    }
}
