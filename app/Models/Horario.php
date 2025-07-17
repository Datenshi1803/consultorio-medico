<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios';

    protected $fillable = ['medico_id', 'dia_semana', 'hora_entrada', 'hora_salida', 'inicio_almuerzo', 'fin_almuerzo'];

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
}
