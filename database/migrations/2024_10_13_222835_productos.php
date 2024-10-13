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
        Schema::create('productos',function(Blueprint $table){
            $table->bigIncrements('id_producto');
            $table->string('id_categoria');
            $table->decimal('stock');
            $table->double('precio');
            $table->string('id_descuento');
            $table->string('id_ubicacion');
            $table->boolean('activo');
            $table->date('caducidad');
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
