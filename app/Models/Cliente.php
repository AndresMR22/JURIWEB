<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    public $fillable = [
        "nombres",
        "apellidos",
        "celular",
        "direccion",
        "genero",
        "fnacimiento",
        "estado_civil",
        "correo",
        // "user_id",
        "provincia_id",
        "responsable_id",
        "cedula"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function juicios()
    {
        return $this->hasMany(Juicio::class);
    }


    // =========================== c c p
    public function cantones()
    {
        return $this->belongsToMany(Canton::class,'canton_cliente_provincias')->withTimestamps()->withPivot('provincia_id');
    }

    public function provincias()
    {
        return $this->belongsToMany(Provincia::class,'canton_cliente_provincias')->withTimestamps()->withPivot('canton_id');
    }

}
