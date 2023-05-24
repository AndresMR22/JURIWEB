<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abogado extends Model
{
    use HasFactory;

    public $fillable=["nombres","apellidos","celular","direccion","genero","estatus","empresa_id","user_id","cedula"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function juicios()
    {
        return $this->hasMany(Juicio::class);
    }

    
    
}
