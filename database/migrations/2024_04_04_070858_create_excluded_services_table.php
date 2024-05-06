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
        Schema::create('excluded_services', function (Blueprint $table) {
            $table->id();
            //nombre del servicio
            $table->string('name');
            //descripcion del servicio
            $table->text('description');
            //relacion con la tabla tours
            $table->foreignId('tour_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excluded_services');
    }
};
