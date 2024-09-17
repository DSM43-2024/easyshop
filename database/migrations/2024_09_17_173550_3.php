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
        Schema::create('venta',function(Blueprint $table){
            $table->bigIncrements('id_venta');
            $table->foreignId('id_persona');
            $table->foreignId('id_usuario');
            $table->foreignId('id_cliente');
            $table->string('tipo_comprobante');
            $table->string('serie_comprobante');
            $table->string('num_comprobante');
            $table->dateTime('fecha');
            $table->decimal('impuesto');
            $table->decimal('total');
            $table->decimal('estado');
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
