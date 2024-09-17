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
        Schema::create('articulo',function(Blueprint $table){
            $table->bigIncrements('id_articulo');
            $table->foreignId('id_categoria');
            $table->string('codigo');
            $table->string('nombre');
            $table->decimal('precio_venta');
            $table->double('stock');
            $table->string('descrpcion');
            $table->string('imagen');
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
