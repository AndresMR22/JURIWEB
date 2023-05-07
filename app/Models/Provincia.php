<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    public $fillable = ["nombre"];

    // =========================== c c p 
    public function cantones()
    {
        return $this->belongsToMany(Canton::class,'canton_cliente_provincias')->withTimestamps()->withPivot('cliente_id');
    }

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class,'canton_cliente_provincias')->withTimestamps()->withPivot('canton_id');
    }
}
