<?php

namespace App\Console\Commands;

use App\Models\Groupe;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

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
        Storage::disk('local')->writeStream('groupes.csv', Storage::disk('sftp')->readStream('data/groupes.csv'));
        $row = 1;
        if (($handle = fopen(storage_path('app/groupes.csv'), "r")) !== FALSE) {
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
        Storage::disk('local')->delete('groupes.csv');
        return 0;
    }
}
