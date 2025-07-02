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
        Schema::create('profesion_publicacion', function (Blueprint $table) {
            $table->unsignedBigInteger('id_publicaciones');
            $table->unsignedBigInteger('id_profesion');


            $table->foreign('id_publicaciones')->references('id_publicaciones')->on('publicaciones')->onDelete('cascade');
            $table->foreign('id_profesion')->references('id_profesion')->on('profesiones')->onDelete('cascade');


            $table->primary(['id_publicaciones', 'id_profesion']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesion_publicacion');
    }
};

