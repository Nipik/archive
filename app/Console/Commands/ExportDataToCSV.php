<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use League\Csv\Writer;
use SplFileObject;

class ExportDataToCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-data-to-c-s-v {table : Nom de la table} {file : Nom du fichier CSV}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exporte des données depuis une table vers un fichier CSV';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $table = $this->argument('table');
        $file = $this->argument('file');

        // Vérifie si la table existe
        if (!DB::table($table)->exists()) {
            $this->error("La table '$table' n'existe pas.");
            return;
        }

        // Récupère les données de la table
        $data = DB::table($table)->get()->toArray();

        // Vérifie si des données existent
        if (empty($data)) {
            $this->info("Aucune donnée à exporter depuis la table '$table'.");
            return;
        }

        // Crée le Writer à partir du chemin du fichier
        $csv = Writer::createFromPath($file, 'w+');

        // Convertit les objets stdClass en tableaux
        $dataArray = array_map('get_object_vars', $data);

        $csv->insertOne(array_keys($dataArray[0]));
        $csv->insertAll($dataArray);

        $this->info("Données exportées depuis la table '$table' vers le fichier '$file'.");
    }
}
