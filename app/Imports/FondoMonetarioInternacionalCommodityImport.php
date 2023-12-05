<?php

namespace App\Imports;

use App\Models\Datasource;
use App\Models\Dato;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithGroupedHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FondoMonetarioInternacionalCommodityImport implements ToModel, WithHeadingRow, WithGroupedHeadingRow
{
    public $index;

    public $nombreDatasource;

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
        if ($row['monthly'][$this->index] == null) {
            return null;
        }

        $fuente = 'Fondo Monetario Internacional';
        $datasource = Datasource::where('nombre', $this->nombreDatasource)->get()->first();
        $serie_id = $datasource->serie_id;
        $datoExistente = Dato::where('clave', $row['frequency'])->where('valor', $row['monthly'][$this->index])
            ->where('serie_id', $serie_id)->where('fuente', $fuente)->get();

        if ($datoExistente->count() > 0) {
            return null;
        }

        $datasource->ultima_actualizacion = date('Y-m-d H:i:s');
        $datasource->save();

        return new Dato([
            'clave' => $row['frequency'],
            'valor' => $row['monthly'][$this->index],
            'fuente' => $fuente,
            'serie_id' => $serie_id
        ]);
    }
}
