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
    public function up(){
    Schema::create('medicos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // FK a usuarios
        $table->string('nombre');
        $table->string('apellido');
        $table->date('fechanacimiento');
        $table->string('tipo_sangre')->nullable();
        $table->foreignId('especialidad_id')->constrained('especialidades')->onDelete('cascade');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
};
