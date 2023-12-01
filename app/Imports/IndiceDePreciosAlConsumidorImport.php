<?php

namespace App\Imports;

use App\Models\Datasource;
use App\Models\Dato;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class IndiceDePreciosAlConsumidorImport implements ToModel, WithHeadingRow
{
    public function mapping(): array
    {
        return [
            'año'  => 'A4',
            'mes' => 'B4',
            'glosa' => 'H4',
            'índice' => 'J4'
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
        $nombreDatasource = 'Indice de Precios al Consumidor';
        $glosa = 'IPC General';
        $fuente = 'INE';

        if ($row['glosa'] != $glosa) {
            return null;
        }

        $datasource = Datasource::where('nombre', $nombreDatasource)->get()->first();
        $serie_id = $datasource->serie_id;
        $datoExistente = Dato::where('clave', $row['ano'] . ' - ' . $row['mes'])->where('valor', $row['indice'])
            ->where('serie_id', $serie_id)->where('fuente', $fuente)->get();

        if ($datoExistente->count() > 0) {
            return null;
        }

        $datasource->ultima_actualizacion = date('Y-m-d H:i:s');
        $datasource->save();

        return new Dato([
            'clave' => $row['ano'] . ' - ' . $row['mes'],
            'valor' => $row['indice'],
            'fuente' => $fuente,
            'serie_id' => $serie_id
        ]);
    }
}
