<?php

namespace App\Imports;

use App\Models\Dato;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Serie;
use App\Models\Datasource;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class GrossDomesticProductImport implements ToModel, WithHeadingRow, WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            'Data' => $this,
        ];
    }

    public function headingRow(): int
    {
        return 4;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $countryName = $row["country_name"];
        $source = "World Development Indicators / The World Bank";
        $datasourceName = "Gross Domestic Product";
        $originalDatasource = Datasource::where('nombre', $datasourceName)->first();

        $serie = new Serie;
        $serie->nombre = "Gross Domestic Product of {$countryName}";
        $serie->descripcion = "It shows the evolution of the Gross Domestic Product of {$countryName}";
        $serie->eje_x = "Year";
        $serie->eje_y = "Dollars";
        $serie->ente = "Countries";
        $serie->source = $source;
        $serie->save();

        $datasource = new Datasource;
        $datasource->nombre = "Gross Domestic Product of {$countryName}";
        $datasource->url = $originalDatasource->url;
        $datasource->serie_id = $serie->id;
        $datasource->ultima_actualizacion = date('Y-m-d H:i:s');
        $datasource->save();

        for ($i = 1960; $i <= 2022; $i++) {
            if (empty($row[$i])) {
                continue;
            }

            $dato = new Dato;
            $dato->clave = $i;
            $dato->valor = $row[$i];
            $dato->serie_id = $serie->id;
            $dato->save();
        }

        return $serie;
    }
}
