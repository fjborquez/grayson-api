<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioPromedioDelPetroleoImport;
use Illuminate\Console\Command;

class CommoditiesPrecioPromedioDelPetroleo extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-promedio-del-petroleo';
        $this->description = 'Importar historicos del precio promedio del petroleo';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio promedio del petroleo';
        $this->import = new CommoditiesPrecioPromedioDelPetroleoImport();
        $this->import->index = 43;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
