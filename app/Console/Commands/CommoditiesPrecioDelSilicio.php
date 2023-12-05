<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelSilicioImport;

class CommoditiesPrecioDelSilicio extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-silicio';
        $this->description = 'Importar historicos del precio del silicio';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del silicio';
        $this->import = new CommoditiesPrecioDelSilicioImport();
        $this->import->index = 92;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
