<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesGasNaturalPrecioDePaisesBajosImport;

class CommoditiesGasNaturalPrecioDePaisesBajos extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-gas-natural-precio-de-paises-bajos';
        $this->description = 'Importar historicos del precio del gas natural en Paises Bajos';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Gas natural precio de Paises Bajos';
        $this->import = new CommoditiesGasNaturalPrecioDePaisesBajosImport();
        $this->import->index = 39;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
