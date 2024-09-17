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
        Schema::create('persona',function(Blueprint $table){
            $table->bigIncrements('id_persona');
            $table->string('tipo_presona');
            $table->string('tipo_documento');
            $table->double('num_documento');
            $table->string('direccion');
            $table->double('telefono');
            $table->string('email');
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
