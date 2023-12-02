<?php

namespace App\Console\Commands;

use App\Imports\USTotalDeCréditoAlConsumoEnPropiedadYTitulizadoNivelDesestacionalizado as ImportsUSTotalDeCréditoAlConsumoEnPropiedadYTitulizadoNivelDesestacionalizado;
use App\Models\Datasource;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class USTotalDeCréditoAlConsumoEnPropiedadYTitulizadoNivelDesestacionalizado extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importar:Total-de-credito-al-consumo-en-propiedad-y-titulizado-nivel-desestacionalizado';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Total de creditos de consumo en Estados Unidos';

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
        $nombreDatasource = 'US - Total de crédito al consumo en propiedad y titulizado, nivel desestacionalizado';
        $datasource = Datasource::where('nombre', $nombreDatasource)->first();
        $url = $datasource->url;
        $filename = 'temp/series.csv';
        $response = Http::get($url);
        Storage::disk('local')->put($filename, $response->body());
        Excel::import(new ImportsUSTotalDeCréditoAlConsumoEnPropiedadYTitulizadoNivelDesestacionalizado, $filename, 'local');
        return 0;
    }
}
