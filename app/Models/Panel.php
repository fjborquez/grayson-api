<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Panel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'paneles';
    protected $fillable = ['nombre', 'descripcion'];

    public function series(): BelongsToMany
    {
        return $this->belongsToMany(Serie::class);
    }

    public function insiders(): belongsToMany
    {
        return $this->belongsToMany(SubpanelInsider::class);
    }

    public function resultadosAnuales(): belongsToMany
    {
        return $this->belongsToMany(SubpanelResultadoAnual::class, 'panel_subpanel_resultado_anual', 'panel_id', 'subpanel_res_anual_id');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
