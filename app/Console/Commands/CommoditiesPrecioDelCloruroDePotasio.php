<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelCloruroDePotasioImport;

class CommoditiesPrecioDelCloruroDePotasio extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-cloruro-de-potasio';
        $this->description = 'Importar historicos del precio del cloruro de potasio';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del cloruro de potasio';
        $this->import = new CommoditiesPrecioDelCloruroDePotasioImport();
        $this->import->index = 81;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
