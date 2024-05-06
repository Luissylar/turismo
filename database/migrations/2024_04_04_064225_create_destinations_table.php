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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            //campos para destinos turisticos
            //para el titulo
            $table->string('title');
            //para la descripcion
            $table->text('description');
            //para la imagen
            $table->string('image');
            //para la direccion
            $table->string('address');
            //para la latitud
            $table->string('latitude');
            //para la longitud
            $table->string('longitude');
            //para el estado
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            //para el clima, accesibilidad
            $table->string('weather');
            $table->string('slug');
            //para la accesibilidad
            $table->string('accesibility');
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
