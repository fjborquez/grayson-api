<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Dato extends Model
{
    use HasFactory;
    protected $table = 'datos';
    protected $fillable = ['clave', 'valor', 'serie_id'];

    protected function valor(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => intval($value)
        );
    }

    public function series(): BelongsTo
    {
        return $this->belongsTo(Serie::class);
    }
}
