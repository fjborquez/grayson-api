<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Datasource;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PEProduccionMinera extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importar:pe-produccion-minera';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Para usar de clase padre';

    public $nombreDatasource = 'PE - ';

    public $file = 'temp/1900-2022.xlsx';

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

    protected function download()
    {
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
