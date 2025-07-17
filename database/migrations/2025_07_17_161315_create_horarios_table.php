<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('horarios', function (Blueprint $table) {
        $table->id();
        $table->foreignId('medico_id')->constrained('medicos')->onDelete('cascade');
        $table->string('dia_semana'); // Lunes, Martes, etc.
        $table->time('hora_entrada');
        $table->time('hora_salida');
        $table->time('inicio_almuerzo')->nullable();
        $table->time('fin_almuerzo')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
};
