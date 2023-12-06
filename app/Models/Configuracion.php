<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Configuracion extends Model
{
    use HasFactory;
    protected $table = 'configuraciones';
    protected $fillable = ['nombre', 'descripcion', 'formato'];

    public function paneles(): BelongsTo
    {
        return $this->belongsTo(Serie::class);
    }

    public function opciones(): HasMany
    {
        return $this->hasMany(Opcion::class);
    }
}
