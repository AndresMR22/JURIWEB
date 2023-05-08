<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnidadJudicial;


class UnidadJudicialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnidadJudicial::create([
            "nombre"=>"Unidad Judicial 1",
            "ubicacion"=>"Guayaquil",
            "direccion"=>"Av. calle Leon Borja y 13 Octubre",
        ]);
    }
}
