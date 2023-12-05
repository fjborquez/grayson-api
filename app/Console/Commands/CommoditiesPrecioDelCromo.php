<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelCromoImport;

class CommoditiesPrecioDelCromo extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-cromo';
        $this->description = 'Importar historicos del precio del cromo';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del cromo';
        $this->import = new CommoditiesPrecioDelCromoImport();
        $this->import->index = 87;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
