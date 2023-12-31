<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dato extends Model
{
    use HasFactory;
    protected $table = 'datos';
    protected $fillable = ['clave', 'valor', 'fuente'];

    public function series(): BelongsTo
    {
        return $this->belongsTo(Serie::class);
    }
}
