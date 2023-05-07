<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadJudicial extends Model
{
    use HasFactory;
    public $fillable =
    ["nombre",
    "ubicacion",
    "direccion"
    ];

    public function juicios()
    {
        return $this->hasMany(Juicio::class);
    }
}
