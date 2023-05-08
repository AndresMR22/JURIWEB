<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audiencia extends Model
{
    use HasFactory;

    public $fillable = [
        "fecha","observacion","juicio_id"
    ];

    public function juicio()
    {
        return $this->belongsTo(Juicio::class);
    }
}
