<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * falta agregar la funcionalidad de esta migración
     */
    public function up(): void
    {
        Schema::create('email_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('email_type');  // Ejemplos: 'welcome_email', 'newsletter', 'user_initiated'
            $table->boolean('is_automatic')->default(true);  // True para correos automáticos, false para manuales
            $table->foreignId('actor_id')->constrained('users')->nullable();  // Usuario que envió el correo, si aplica
            $table->string('status')->default('pending')->index();
            $table->json('metadata')->nullable();  // Almacenar datos adicionales en formato JSON
            $table->text('error_message')->nullable();
            $table->string('error_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_logs');
    }
};
