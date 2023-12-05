<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelCobaltoImport;

class CommoditiesPrecioDelCobalto extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-cobalto';
        $this->description = 'Importar historicos del precio del cobalto';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del cobalto';
        $this->import = new CommoditiesPrecioDelCobaltoImport();
        $this->import->index = 74;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
