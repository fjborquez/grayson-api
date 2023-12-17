<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\PEProduccionDeCadmioImport;

class PEProduccionDeCadmio extends PEProduccionMinera
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importar:pe-produccion-de-cadmio';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Produccion de cadmio de peru';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:pe-produccion-de-cadmio';
        $this->description = 'Produccion de cadmio de peru';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Produccion de cadmio';
        $this->import = new PEProduccionDeCadmioImport();
        $this->import->index = 'cadmio';
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
