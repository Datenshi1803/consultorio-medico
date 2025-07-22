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
    Schema::create('pacientes', function (Blueprint $table) {
        $table->id();
        $table->string('nombre1');
        $table->string('nombre2')->nullable();
        $table->string('apellido1');
        $table->string('apellido2')->nullable();
        $table->date('fechadenacimiento');
        $table->string('tipo_sangre')->nullable();
        $table->text('padecimientos_anteriores')->nullable();
        $table->text('predisposiciones')->nullable();
        $table->string('genero');
        $table->string('telefono_principal');
        $table->string('telefono_emergencia')->nullable();
        $table->string('correo')->unique();
        $table->string('direccion');
        $table->text('alergias')->nullable();
        $table->text('medicamentos')->nullable();
        $table->text('historial_cirugias')->nullable();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('pacientes');
    }
};
