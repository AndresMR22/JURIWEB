<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    use HasFactory;
    public $fillable=["canton"];

    // =========================== c c p 
    public function clientes()
    {
        return $this->belongsToMany(Cliente::class,'canton_cliente_provincias')->withTimestamps()->withPivot('provincia_id');
    }

    public function provincias()
    {
        return $this->belongsToMany(Provincia::class,'canton_cliente_provincias')->withTimestamps()->withPivot('cliente_id');
    }
}
