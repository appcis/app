<?php

namespace App\Console\Commands;

use App\Models\Groupe;
use Illuminate\Console\Command;

class ImportGroupe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:groupe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import des groupes depuis un fichier CSV';

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
        $row = 1;
        if (($handle = fopen(public_path('groupes.csv'), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if ($data[1] === 'name') {
                    continue;
                }
                Groupe::updateOrCreate(
                    ['name' => $data[1]],
                    ['description' => $data[2]],
                );
                $row++;
            }
            fclose($handle);
        }
        return 0;
    }
}
