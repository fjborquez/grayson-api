<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\PEProduccionDePlomoImport;

class PEProduccionDePlomo extends PEProduccionMinera
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importar:pe-produccion-de-plomo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Produccion de plomo de peru';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:pe-produccion-de-plomo';
        $this->description = 'Produccion de plomo de peru';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Produccion de plomo';
        $this->import = new PEProduccionDePlomoImport();
        $this->import->index = 'plomo';
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
