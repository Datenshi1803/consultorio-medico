<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = [
        'nombre1', 'nombre2', 'apellido1', 'apellido2', 'fechadenacimiento',
        'tipo_sangre', 'padecimientos_anteriores', 'predisposiciones', 'genero',
        'telefono_principal', 'telefono_emergencia', 'correo', 'direccion',
        'alergias', 'medicamentos', 'historial_cirugias', 'usuario_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class);
    }
}
