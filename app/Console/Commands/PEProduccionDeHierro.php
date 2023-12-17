<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\PEProduccionDeHierroImport;

class PEProduccionDeHierro extends PEProduccionMinera
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importar:pe-produccion-de-hierro';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Produccion de hierro de peru';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:pe-produccion-de-hierro';
        $this->description = 'Produccion de hierro de peru';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Produccion de hierro';
        $this->import = new PEProduccionDeHierroImport();
        $this->import->index = 'hierro';
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
