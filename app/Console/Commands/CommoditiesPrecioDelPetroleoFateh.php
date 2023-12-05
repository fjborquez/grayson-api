<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelPetroleoFatehImport;
use Illuminate\Console\Command;

class CommoditiesPrecioDelPetroleoFateh extends FondoMonetarioInternacionalCommodity
{

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-petroleo-fateh';
        $this->description = 'Importar historicos del precio del petroleo fateh';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del petroleo fateh';
        $this->import = new CommoditiesPrecioDelPetroleoFatehImport();
        $this->import->index = 45;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
