<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasource extends Model
{
    use HasFactory;
    protected $table = 'datasources';
    protected $fillable = ['id', 'nombre', 'url', 'ultima_actualizacion', 'serie_id'];

    public function serie() {
        return $this->belongsTo(Serie::class);
    }
}
