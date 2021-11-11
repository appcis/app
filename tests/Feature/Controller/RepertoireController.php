<?php

namespace Tests\Feature\Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RepertoireController extends TestCase
{
    use RefreshDatabase;

    private $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $this->admin = User::all()->first();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_repertoire_route()
    {
        $response = $this->actingAs($this->admin)
            ->get(route('repertoire'));

        $response->assertStatus(200);
    }
}
