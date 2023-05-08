<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Juicio;

class JuicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Juicio::create([
            "nro"=>"1",
            "materia"=>"materia 1",
            "estadop"=>"estado 1",
            "fecha"=>"2023-05-08 01:08:31",
            "estatus"=>"A",
            "abogado_id"=>"1",
            "cliente_id"=>"1",
            "unidad_juidicial_id"=>"1",
        ]);
    }
}
