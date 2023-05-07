<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CantonClienteProvincia extends Pivot
{
    use HasFactory;
    protected $table = 'canton_cliente_provincias';
    protected $fillable = [
        'canton_id',
        'cliente_id',
        'provincia_id',
    ];

    // ============== dieta_acd
    // public function dieta()
    // {
    //     return $this->belongsToMany(Dieta::class,'dietas','acd_id','dieta_id')->withTimestamps();
    // }
}
