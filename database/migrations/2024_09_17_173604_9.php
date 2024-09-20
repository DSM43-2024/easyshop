<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingreso',function(Blueprint $table){
            $table->bigIncrements('id_ingreso');
            $table->foreignId('id_proveedor');
            $table->foreignId('id_usuario');
            $table->string('tipo_comprobante');
            $table->double('serie_comprobante');
            $table->double('num_comprobante');
            $table->dateTime('fecha');
            $table->decimal('impuesto');
            $table->decimal('total');
            $table->boolean('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
