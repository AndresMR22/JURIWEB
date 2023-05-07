<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            "razon"=>"RAZON 123",
            "direccion"=>"Av. calle 123",
            "correo"=>"abc@gmail.com",
            "celular"=>"0988703045"
        ]);
    }
}
