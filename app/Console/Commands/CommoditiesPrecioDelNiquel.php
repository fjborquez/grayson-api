<?php

namespace App\Console\Commands;

use App\Imports\CommoditiesPrecioDelNiquelImport;
use Illuminate\Console\Command;

class CommoditiesPrecioDelNiquel extends FondoMonetarioInternacionalCommodity
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = 'importar:commodities-precio-del-niquel';
        $this->description = 'Importar historicos del precio del niquel';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nombreDatasource = $this->nombreDatasource . 'Precio del niquel';
        $this->import = new CommoditiesPrecioDelNiquelImport();
        $this->import->index = 42;
        $this->import->nombreDatasource = $this->nombreDatasource;

        parent::handle();

        return 0;
    }
}
