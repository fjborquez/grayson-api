<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelCobreImport;
use App\Models\Datasource;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CommoditiesPrecioDelCobre extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importar:commodities-precio-del-cobre';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importar valores historicos de precio del cobre';

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
        $nombreDatasource = 'Commodities - Precio del cobre';
        $datasource = Datasource::where('nombre', $nombreDatasource)->first();
        $url = $datasource->url;
        $filename = 'temp/external-dataoct.xls';
        $response = Http::get($url);
        Storage::disk('local')->put($filename, $response->body());
        Excel::import(new CommoditiesPrecioDelCobreImport, $filename, 'local');
        return 0;
    }
}
