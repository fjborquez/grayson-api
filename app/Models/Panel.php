<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Panel extends Model
{
    use HasFactory;
    protected $table = 'paneles';
    protected $fillable = ['nombre', 'descripcion'];

    public function series(): BelongsToMany
    {
        return $this->belongsToMany(Serie::class);
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }
}
