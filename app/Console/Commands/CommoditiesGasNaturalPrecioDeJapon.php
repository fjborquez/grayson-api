<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesGasNaturalPrecioDeJaponImport;

class CommoditiesGasNaturalPrecioDeJapon extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-gas-natural-precio-de-japon';
        $this->description = 'Importar historicos del precio del gas natural en Japon';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Gas natural precio de Japon';
        $this->import = new CommoditiesGasNaturalPrecioDeJaponImport();
        $this->import->index = 40;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
