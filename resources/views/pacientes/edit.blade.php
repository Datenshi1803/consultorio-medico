@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <h2>Editar Paciente</h2>

  <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')

    <div class="row g-3">
      <div class="col-md-6">
        <label for="nombre1" class="form-label">Nombre 1 *</label>
        <input type="text" name="nombre1" id="nombre1" class="form-control" value="{{ old('nombre1', $paciente->nombre1) }}" required oninput="sinNumeros(this)">
      </div>
      <div class="col-md-6">
        <label for="nombre2" class="form-label">Nombre 2</label>
        <input type="text" name="nombre2" id="nombre2" class="form-control" value="{{ old('nombre2', $paciente->nombre2) }}" required oninput="sinNumeros(this)">
      </div>

      <div class="col-md-6">
        <label for="apellido1" class="form-label">Apellido 1 *</label>
        <input type="text" name="apellido1" id="apellido1" class="form-control" value="{{ old('apellido1', $paciente->apellido1) }}" required oninput="sinNumeros(this)">
      </div>

      <div class="col-md-6">
        <label for="apellido2" class="form-label">Apellido 2</label>
        <input type="text" name="apellido2" id="apellido2" class="form-control" value="{{ old('apellido2', $paciente->apellido2) }}" required oninput="sinNumeros(this)">
      </div>

      <div class="col-md-6">
        <label for="fechadenacimiento" class="form-label">Fecha de Nacimiento *</label>
        <input type="date" name="fechadenacimiento" id="fechadenacimiento" class="form-control" value="{{ old('fechadenacimiento', $paciente->fechadenacimiento) }}" required>
      </div>

      <div class="col-md-6">
        <label for="tipo_sangre" class="form-label">Tipo de Sangre</label>
        <input type="text" name="tipo_sangre" id="tipo_sangre" class="form-control" value="{{ old('tipo_sangre', $paciente->tipo_sangre) }}" required >
      </div>

      <div class="col-md-6">
        <label for="padecimientos_anteriores" class="form-label">Padecimientos Anteriores</label>
        <textarea name="padecimientos_anteriores" id="padecimientos_anteriores" rows="2" class="form-control">{{ old('padecimientos_anteriores', $paciente->padecimientos_anteriores) }}</textarea>
      </div>
      <div class="col-md-6">
        <label for="predisposiciones" class="form-label">Predisposiciones</label>
        <textarea name="predisposiciones" id="predisposiciones" rows="2" class="form-control">{{ old('predisposiciones', $paciente->predisposiciones) }}</textarea>
      </div>

      <div class="col-md-6">
        <label for="genero" class="form-label">Género</label>
        <select name="genero" id="genero" class="form-select">
          <option value="">Selecciona...</option>
          <option value="Masculino" {{ old('genero', $paciente->genero) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
          <option value="Femenino" {{ old('genero', $paciente->genero) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
          <option value="Otro" {{ old('genero', $paciente->genero) == 'Otro' ? 'selected' : '' }}>Otro</option>
        </select>
      </div>

      <div class="col-md-6">
        <label for="telefono_principal" class="form-label">Teléfono Principal</label>
        <input type="text" name="telefono_principal" id="telefono_principal" class="form-control" value="{{ old('telefono_principal', $paciente->telefono_principal) }}">
      </div>

      <div class="col-md-6">
        <label for="telefono_emergencia" class="form-label">Teléfono de Emergencia</label>
        <input type="text" name="telefono_emergencia" id="telefono_emergencia" class="form-control" value="{{ old('telefono_emergencia', $paciente->telefono_emergencia) }}">
      </div>

      <div class="col-md-6">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" name="correo" id="correo" class="form-control" value="{{ old('correo', $paciente->correo) }}">
      </div>

      <div class="col-md-12">
        <label for="direccion" class="form-label">Dirección</label>
        <textarea name="direccion" id="direccion" rows="2" class="form-control">{{ old('direccion', $paciente->direccion) }}</textarea>
      </div>

      <div class="col-md-6">
        <label for="alergias" class="form-label">Alergias</label>
        <textarea name="alergias" id="alergias" rows="2" class="form-control">{{ old('alergias', $paciente->alergias) }}</textarea>
      </div>

      <div class="col-md-6">
        <label for="medicamentos" class="form-label">Medicamentos</label>
        <textarea name="medicamentos" id="medicamentos" rows="2" class="form-control">{{ old('medicamentos', $paciente->medicamentos) }}</textarea>
      </div>

      <div class="col-md-12">
        <label for="historial_cirugias" class="form-label">Historial de Cirugías</label>
        <textarea name="historial_cirugias" id="historial_cirugias" rows="3" class="form-control">{{ old('historial_cirugias', $paciente->historial_cirugias) }}</textarea>
      </div>
    </div>

    <div class="mt-4">
      <button type="submit" class="btn btn-primary">Guardar cambios</button>
      <a href="{{ route('pacientes.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </div>
  </form>
</div>
@endsection