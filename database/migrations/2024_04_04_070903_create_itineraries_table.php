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
        Schema::create('itineraries', function (Blueprint $table) {
            $table->id();
            //nombre del titulo
            $table->string('title');
            //descripcion del itinerario
            $table->text('description');
            //hora de inicio
            $table->time('start');
            //hora de finalizacion
            $table->time('end');
            
            //relacion con la tabla toursxD
            $table->foreignId('tour_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itineraries');
    }
};
