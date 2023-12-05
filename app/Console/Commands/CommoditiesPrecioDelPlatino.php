<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelPlatinoImport;

class CommoditiesPrecioDelPlatino extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-platino';
        $this->description = 'Importar historicos del precio del platino';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del platino';
        $this->import = new CommoditiesPrecioDelPlatinoImport();
        $this->import->index = 78;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
