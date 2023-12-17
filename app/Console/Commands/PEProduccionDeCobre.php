<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Datasource;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PEProduccionDeCobreImport;

class PEProduccionDeCobre extends PEProduccionMinera
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importar:pe-produccion-de-cobre';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Produccion de cobre de peru';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:pe-produccion-de-cobre';
        $this->description = 'Produccion de cobre de peru';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Produccion de cobre';
        $this->import = new PEProduccionDeCobreImport();
        $this->import->index = 'cobre';
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
