<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelOroImport;

class CommoditiesPrecioDelOro extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-oro';
        $this->description = 'Importar historicos del precio del oro';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del oro';
        $this->import = new CommoditiesPrecioDelOroImport();
        $this->import->index = 75;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
