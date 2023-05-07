<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juicio extends Model
{
    use HasFactory;
    public $fillable = [
        "nro",
        "materia",
        "estadop",
        "fecha",
        "estatus",
        "abogado_id",
        "cliente_id",
        "unidad_juidicial_id",
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function abogado()
    {
        return $this->belongsTo(Abogado::class);
    }

    public function unidad_judicial()
    {
        return $this->belongsTo(UnidadJudicial::class);
    }

}
