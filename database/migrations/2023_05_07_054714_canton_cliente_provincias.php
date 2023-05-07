<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CantonClienteProvincias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canton_cliente_provincias', function (Blueprint $table) {
        $table->id();
            $table->unsignedBigInteger('canton_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('provincia_id');   
            $table->integer('cantidad')->default(1);       
            $table->foreign('canton_id')->references('id')->on('cantons')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('provincia_id')->references('id')->on('provincias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('canton_cliente_provincias');
    }
}
