<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
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
    public function test_sms_routes()
    {
        $routes = [
            route('sms.send'),
            route('sms.historique'),
            //route('sms.show')
        ];

        foreach ($routes as $route) {
            $response = $this
                ->actingAs($this->admin)
                ->get($route);

            $response->assertStatus(200);
        }
    }
}
