<?php

namespace Tests\Feature\Models;

use App\Models\Sondage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SondageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_factory()
    {
        Sondage::factory()->count(20)->create();

        $this->assertDatabaseCount('sondages', 20);
    }
}
