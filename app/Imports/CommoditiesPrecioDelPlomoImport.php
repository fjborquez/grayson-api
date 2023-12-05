<?php

namespace App\Imports;

use App\Models\Datasource;
use App\Models\Dato;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithGroupedHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CommoditiesPrecioDelPlomoImport implements ToModel, WithHeadingRow, WithGroupedHeadingRow
{

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
        $nombreDatasource = 'Commodities - Precio del plomo';
        $fuente = 'Fondo Monetario Internacional';
        $datasource = Datasource::where('nombre', $nombreDatasource)->get()->first();
        $serie_id = $datasource->serie_id;
        $datoExistente = Dato::where('clave', $row['frequency'])->where('valor', $row['monthly'][35])
            ->where('serie_id', $serie_id)->where('fuente', $fuente)->get();

        if ($datoExistente->count() > 0) {
            return null;
        }

        $datasource->ultima_actualizacion = date('Y-m-d H:i:s');
        $datasource->save();

        return new Dato([
            'clave' => $row['frequency'],
            'valor' => $row['monthly'][35],
            'fuente' => $fuente,
            'serie_id' => $serie_id
        ]);
    }
}
