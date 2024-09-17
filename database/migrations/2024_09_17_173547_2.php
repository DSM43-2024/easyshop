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
            $table->bigIncrements('id_detalle_venta');
            $table->foreignId('id_venta');
            $table->foreignId('id_articulo');
            $table->double('cantidad');
            $table->decimal('precio');
            $table->decimal('descuento');
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
