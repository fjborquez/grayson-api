<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelZincImport;

class CommoditiesPrecioDelZinc extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-zinc';
        $this->description = 'Importar historicos del precio del zinc';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del zinc';
        $this->import = new CommoditiesPrecioDelZincImport();
        $this->import->index = 72;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
