<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelPropanoImport;

class CommoditiesPrecioDelPropano extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-propano';
        $this->description = 'Importar historicos del precio del propano';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del propano';
        $this->import = new CommoditiesPrecioDelPropanoImport();
        $this->import->index = 79;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
