<?php

namespace App\Imports;

use App\Models\Datasource;
use App\Models\Dato;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class USTotalDeCréditoAlConsumoEnPropiedadYTitulizadoNivelDesestacionalizado implements ToModel, WithHeadingRow
{
    public function headingRow(): int
    {
        return 6;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $nombreDatasource = 'US - Total de crédito al consumo en propiedad y titulizado, nivel desestacionalizado';
        $fuente = 'Reserva Federal';
        $datasource = Datasource::where('nombre', $nombreDatasource)->get()->first();
        $serie_id = $datasource->serie_id;
        $datoExistente = Dato::where('clave', $row['time_period'])->where('valor', $row['dtctlm'] * 1000000)
            ->where('serie_id', $serie_id)->where('fuente', $fuente)->get();

        if ($datoExistente->count() > 0) {
            return null;
        }

        $datasource->ultima_actualizacion = date('Y-m-d H:i:s');
        $datasource->save();

        return new Dato([
            'clave' => $row['time_period'],
            'valor' => $row['dtctlm'] * 1000000,
            'fuente' => $fuente,
            'serie_id' => $serie_id
        ]);
    }
}
