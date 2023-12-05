<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelPentoxidoDeVanadioImport;
use Illuminate\Console\Command;

class CommoditiesPrecioDelPentoxidoDeVanadio extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-pentoxido-de-vanadio';
        $this->description = 'Importar historicos del precio del pentoxido de vanadio';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del pentoxido de vanadio';
        $this->import = new CommoditiesPrecioDelPentoxidoDeVanadioImport();
        $this->import->index = 93;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
