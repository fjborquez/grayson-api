<?php

namespace App\Console\Commands;

use App\Models\Datasource;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class FondoMonetarioInternacionalCommodity extends Command
{

    protected $signature = 'importar:fondo-monetario-internacional-commodity';

    protected $description = 'Para usar de clase padre';

    public $nombreDatasource = 'Commodities - ';

    public $file = 'temp/external-dataoct.xls';

    public $import;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function download() {
        $datasource = Datasource::where('nombre', $this->nombreDatasource)->first();
        $url = $datasource->url;
        $response = Http::get($url);
        Storage::disk('local')->put($this->file, $response->body());
    }

    protected function import() {
        Excel::import($this->import, $this->file, 'local');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->download();
        $this->import();
        return 0;
    }
}
