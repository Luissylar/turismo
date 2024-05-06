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
        Schema::create('user_documentos', function (Blueprint $table) {
            $table->id('id_user_documento');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_tipo_documento'); // Corregido a unsignedBigInteger
            $table->string('numero', 25)->nullable();
            
            $table->timestamps();
    
            // Define foreign keys
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_tipo_documento')->references('id_tipo_documento')->on('tipo_documentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_documentos');
    }
};
