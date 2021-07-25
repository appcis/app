<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agents = collect([
            ['nom' => 'DAVENEL', 'prenom' => 'Vincent', 'phone' => '0659300020']
        ]);

        $agents->each(function ($agent) {
            Agent::create($agent);
        });
    }
}
