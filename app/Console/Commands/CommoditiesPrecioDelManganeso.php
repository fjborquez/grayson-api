<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelManganesoImport;

class CommoditiesPrecioDelManganeso extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-manganeso';
        $this->description = 'Importar historicos del precio del manganeso';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del manganeso';
        $this->import = new CommoditiesPrecioDelManganesoImport();
        $this->import->index = 90;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
