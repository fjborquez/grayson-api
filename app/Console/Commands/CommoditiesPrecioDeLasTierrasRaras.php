<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDeLasTierrasRarasImport;

class CommoditiesPrecioDeLasTierrasRaras extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-de-las-tierras-raras';
        $this->description = 'Importar historicos del precio de las tierras raras';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio de las tierras raras';
        $this->import = new CommoditiesPrecioDeLasTierrasRarasImport();
        $this->import->index = 91;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
