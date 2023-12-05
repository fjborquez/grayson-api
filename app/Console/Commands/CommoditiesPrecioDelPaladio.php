<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelPaladioImport;

class CommoditiesPrecioDelPaladio extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-paladio';
        $this->description = 'Importar historicos del precio del paladio';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del paladio';
        $this->import = new CommoditiesPrecioDelPaladioImport();
        $this->import->index = 77;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
