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
    Schema::create('notificaciones', function (Blueprint $table) {
        $table->id();
        $table->timestamp('fecha_notificacion')->useCurrent();
        $table->enum('tipo', ['paciente', 'medico']);
        $table->foreignId('paciente_id')->nullable()->constrained('pacientes')->onDelete('cascade');
        $table->foreignId('medico_id')->nullable()->constrained('medicos')->onDelete('cascade');
        $table->string('mensaje');
        $table->boolean('leido')->default(false);
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
        Schema::dropIfExists('notificaciones');
    }
};
