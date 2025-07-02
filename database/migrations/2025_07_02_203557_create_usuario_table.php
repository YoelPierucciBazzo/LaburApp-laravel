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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('mail')->unique();
            $table->string('domicilio')->nullable();
            $table->string('foto_perfil', 222)->nullable();
            $table->string('contraseña', 255);
            $table->string('telefono', 20)->nullable();
            $table->text('informacion')->nullable();
            $table->unsignedBigInteger('id_localidad')->nullable();
            $table->unsignedBigInteger('id_rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
