<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubpanelResultadoAnual extends Model
{
    use HasFactory;
    protected $table = 'subpaneles_resultado_anual';
    protected $fillable = ['nombre', 'descripcion', 'url', 'ente'];

    public function paneles() {
        return $this->belongsToMany(Panel::class, 'panel_subpanel_resultado_anual', 'subpanel_res_anual_id', 'panel_id');
    }
}
