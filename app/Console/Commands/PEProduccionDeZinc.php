<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\PEProduccionDeZincImport;

class PEProduccionDeZinc extends PEProduccionMinera
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importar:pe-produccion-de-zinc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Produccion de zinc de peru';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:pe-produccion-de-zinc';
        $this->description = 'Produccion de zinc de peru';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Produccion de zinc';
        $this->import = new PEProduccionDeZincImport();
        $this->import->index = 'zinc';
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
