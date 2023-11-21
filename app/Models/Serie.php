<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Serie extends Model
{
    use HasFactory;
    protected $table = 'series';
    protected $fillable = ['nombre', 'eje_x', 'eje_y', 'descripcion', 'ente'];

    public function paneles(): BelongsToMany
    {
        return $this->belongsToMany(Panel::class, 'panel_series', 'series_id', 'panel_id');
    }

    public function datos()
    {
        return $this->hasMany(Dato::class);
    }
}
