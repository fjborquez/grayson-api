<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesGasNaturalPrecioDeEstadosUnidosImport;

class CommoditiesGasNaturalPrecioDeEstadosUnidos extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-gas-natural-precio-de-estados-unidos';
        $this->description = 'Importar historicos del precio del gas natural en Estados Unidos';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Gas natural precio de Estados Unidos';
        $this->import = new CommoditiesGasNaturalPrecioDeEstadosUnidosImport();
        $this->import->index = 41;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
