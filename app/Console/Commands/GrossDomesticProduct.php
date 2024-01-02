<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Datasource;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GrossDomesticProductImport;

class GrossDomesticProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:gross-domestic-product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import GDP for various countries and years';

    public $datasourceName = 'Gross Domestic Product';

    public $file = 'temp/gdp.xls';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function headingRow(): int
    {
        return 4;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->download();
        $this->import();
        return 0;
    }

    private function download()
    {
        $datasource = Datasource::where('nombre', $this->datasourceName)->first();
        $url = $datasource->url;
        $response = Http::get($url);
        Storage::disk('local')->put($this->file, $response->body());
    }

    private function import()
    {
        Excel::import(new GrossDomesticProductImport, $this->file, 'local');
    }
}
