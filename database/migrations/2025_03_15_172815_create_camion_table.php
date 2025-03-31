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
        Schema::create('camion', function (Blueprint $table) {
            $table->id('id_camion');
            $table->string('placa', 8);
            $table->string('codig_interno', 8); 
            $table->unsignedBigInteger('id_transporte');
            $table->string('color', 35)->nullable();
            $table->date('modelo')->nullable();
            $table->string('capacidad_toneladas', 45)->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->unsignedBigInteger('id_marca');
            
            $table->foreign('id_transporte')->references('id_transporte')->on('transporte');
            $table->foreign('id_marca')->references('id_marca')->on('marca');
            
            $table->index('id_camion');
            $table->index('id_transporte');
            $table->index('id_marca');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camion');
    }
};