<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDeLaPlataImport;
use Illuminate\Console\Command;

class CommoditiesPrecioDeLaPlata extends FondoMonetarioInternacionalCommodity
{

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-de-la-plata';
        $this->description = 'Importar historicos del precio de la plata';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio de la plata';
        $this->import = new CommoditiesPrecioDeLaPlataImport();
        $this->import->index = 76;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
