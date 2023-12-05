<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelPetroleoBrentImport;

class CommoditiesPrecioDelPetroleoBrent extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-petroleo-brent';
        $this->description = 'Importar historicos del precio del petroleo brent';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del petroleo brent';
        $this->import = new CommoditiesPrecioDelPetroleoBrentImport();
        $this->import->index = 44;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
