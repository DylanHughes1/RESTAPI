<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('graduados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni')->unique();
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('ciudad_id');
            $table->string('contacto')->unique();

            $table->enum('experiencia_anios', ['menos_5', 'de_5_a_10', 'de_10_a_20', 'mas_20'])->nullable();
            $table->text('habilidades_competencias')->nullable();

            $table->string('cv')->nullable();

            $table->boolean('interes_comunidad')->default('false');
            $table->boolean('interes_oferta')->default('false');
            $table->boolean('interes_demanda')->default('false');

            $table->boolean('validado')->default('false');

            $table->boolean('visibilidad_contacto')->default(true);
            $table->boolean('visibilidad_laboral')->default(true);
            $table->boolean('visibilidad_formacion')->default(true);

            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graduados');
    }
};
