<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\PEProduccionDeMolibdenoImport;

class PEProduccionDeMolibdeno extends PEProduccionMinera
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importar:pe-produccion-de-molibdeno';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Produccion de molibdeno de peru';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:pe-produccion-de-molibdeno';
        $this->description = 'Produccion de molibdeno de peru';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Produccion de molibdeno';
        $this->import = new PEProduccionDeMolibdenoImport();
        $this->import->index = 'molibdeno';
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
