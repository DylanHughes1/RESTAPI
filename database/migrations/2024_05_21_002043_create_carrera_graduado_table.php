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
        Schema::create('carrera_graduado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('graduado_id');
            $table->unsignedBigInteger('carrera_id');
            $table->string('anio_graduacion');

            $table->foreign('graduado_id')->references('id')->on('graduados')->onDelete('cascade');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');

            $table->unique(['graduado_id', 'carrera_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrera_graduado');
    }
};
