<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\PEProduccionDePlataImport;

class PEProduccionDePlata extends PEProduccionMinera
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importar:pe-produccion-de-plata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Produccion de plata de peru';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:pe-produccion-de-plata';
        $this->description = 'Produccion de plata de peru';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Produccion de plata';
        $this->import = new PEProduccionDePlataImport();
        $this->import->index = 'plata';
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
