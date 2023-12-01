<?php

namespace App\Console\Commands;

use App\Imports\IndiceDePreciosAlConsumidorImport;
use App\Models\Datasource;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportIndiceDePreciosAlConsumidorData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importar:indice-de-precios-al-consumidor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importación de datos de IPC';

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
        $nombreDatasource = 'Indice de Precios al Consumidor';
        $datasource = Datasource::where('nombre', $nombreDatasource)->first();
        $url = $datasource->url;
        $filename = 'temp/ipc-xls.xlsx';
        $response = Http::get($url);
        Storage::disk('local')->put($filename, $response->body());
        Excel::import(new IndiceDePreciosAlConsumidorImport, $filename, 'local');
        return 0;
    }
}
