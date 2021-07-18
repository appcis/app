<?php

namespace App\Console\Commands;

use App\Models\Agent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportAgent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:agent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import des agents depuis un fichier CSV';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Storage::put('image.jpg', 'testtest');
        /*$row = 1;
        if (($handle = fopen(public_path('agents.csv'), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if ($data[1] === 'nom') {
                    continue;
                }
                Agent::updateOrCreate(
                    ['nom' => $data[1], 'prenom' => $data[2]],
                    ['phone' => $data[3]],
                );
                $row++;
            }
            fclose($handle);
        }*/
        return 0;
    }
}
