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
        Schema::table('publicaciones', function (Blueprint $table) {

            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_profesion');

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_profesion')->references('id_profesion')->on('profesiones')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('publicaciones', function (Blueprint $table) {
            //
        });
    }
};
