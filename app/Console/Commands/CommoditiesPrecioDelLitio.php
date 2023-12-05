<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelLitioImport;

class CommoditiesPrecioDelLitio extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-litio';
        $this->description = 'Importar historicos del precio del litio';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del litio';
        $this->import = new CommoditiesPrecioDelLitioImport();
        $this->import->index = 89;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
