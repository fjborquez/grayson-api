<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelPetroleoWestTexasIntermediateImport;

class CommoditiesPrecioDelPetroleoWestTexasIntermediate extends FondoMonetarioInternacionalCommodity
{

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-petroleo-west-texas-intermediate';
        $this->description = 'Importar historicos del precio del petroleo West Texas Intermediate';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del petroleo west texas intermediate';
        $this->import = new CommoditiesPrecioDelPetroleoWestTexasIntermediateImport();
        $this->import->index = 45;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
