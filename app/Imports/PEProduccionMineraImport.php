<?php

namespace App\Imports;

use App\Models\Dato;
use App\Models\Datasource;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PEProduccionMineraImport implements ToModel, WithHeadingRow, WithCalculatedFormulas, WithStartRow
{
    public $index;

    public $nombreDatasource;

    public function startRow(): int
    {
        return 8;
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
        if ($row['ano_producto'] == null || $row[$this->index] == '-' || $row[$this->index] == null) {
            return null;
        }

        $fuente = 'Ministerio de Energía y Minas /  Anuarios Estadísticos de Minería';

        $datasource = Datasource::where('nombre', $this->nombreDatasource)->get()->first();
        $serie_id = $datasource->serie_id;
        $datoExistente = Dato::where('clave', $row['ano_producto'])->where('valor', $row[$this->index])->where('serie_id', $serie_id)->where('fuente', $fuente)->get();

        if ($datoExistente->count() > 0) {
            return null;
        }

        $datasource->ultima_actualizacion = date('Y-m-d H:i:s');
        $datasource->save();

        return new Dato([
            'clave' => $row['ano_producto'],
            'valor' => $row[$this->index],
            'fuente' => $fuente,
            'serie_id' => $serie_id,
        ]);
    }
}
