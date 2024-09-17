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
        Schema::create('detalles_ingreso',function(Blueprint $table){
            $table->bigIncrements('id_detalle_ing');
            $table->foreignId('id_ingreso');
            $table->foreignId('id_articulo');
            $table->double('cantidad');
            $table->decimal('precio');
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
