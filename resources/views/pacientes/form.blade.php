@csrf

<div class="mb-3">
    <label for="nombre1" class="form-label">Primer nombre</label>
    <input type="text" name="nombre1" id="nombre1" class="form-control @error('nombre1') is-invalid @enderror"
        value="{{ old('nombre1', $paciente->nombre1 ?? '') }}" placeholder="Primer nombre" required oninput="sinNumeros(this)" maxlength="15">
    @error('nombre1')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nombre2" class="form-label">Segundo nombre</label>
    <input type="text" name="nombre2" id="nombre2" class="form-control @error('nombre2') is-invalid @enderror"
        value="{{ old('nombre2', $paciente->nombre2 ?? '') }}" placeholder="Segundo nombre" oninput="sinNumeros(this)" maxlength="15" >
    @error('nombre2')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="apellido1" class="form-label">Primer apellido</label>
    <input type="text" name="apellido1" id="apellido1" class="form-control @error('apellido1') is-invalid @enderror"
        value="{{ old('apellido1', $paciente->apellido1 ?? '') }}" placeholder="Primer apellido" required>
    @error('apellido1')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="apellido2" class="form-label">Segundo apellido</label>
    <input type="text" name="apellido2" id="apellido2" class="form-control @error('apellido2') is-invalid @enderror"
        value="{{ old('apellido2', $paciente->apellido2 ?? '') }}" placeholder="Segundo apellido">
    @error('apellido2')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="fechadenacimiento" class="form-label">Fecha de nacimiento</label>
    <input type="date" name="fechadenacimiento" id="fechadenacimiento"
        class="form-control @error('fechadenacimiento') is-invalid @enderror"
        value="{{ old('fechadenacimiento', $paciente->fechadenacimiento ?? '') }}" required>
    @error('fechadenacimiento')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="tipo_sangre" class="form-label">Tipo de sangre</label>
    <input type="text" name="tipo_sangre" id="tipo_sangre"
        class="form-control @error('tipo_sangre') is-invalid @enderror"
        value="{{ old('tipo_sangre', $paciente->tipo_sangre ?? '') }}" placeholder="Ejemplo: A+, O-, etc.">
    @error('tipo_sangre')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="padecimientos_anteriores" class="form-label">Padecimientos anteriores</label>
    <textarea name="padecimientos_anteriores" id="padecimientos_anteriores"
        class="form-control @error('padecimientos_anteriores') is-invalid @enderror"
        placeholder="Describe los padecimientos anteriores">{{ old('padecimientos_anteriores', $paciente->padecimientos_anteriores ?? '') }}</textarea>
    @error('padecimientos_anteriores')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="predisposiciones" class="form-label">Predisposiciones</label>
    <textarea name="predisposiciones" id="predisposiciones"
        class="form-control @error('predisposiciones') is-invalid @enderror" placeholder="Describe las predisposiciones">{{ old('predisposiciones', $paciente->predisposiciones ?? '') }}</textarea>
    @error('predisposiciones')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="genero" class="form-label">Género</label>
    <select name="genero" id="genero" class="form-select @error('genero') is-invalid @enderror" required>
        <option value="">Selecciona</option>
        <option value="Masculino" {{ old('genero', $paciente->genero ?? '') == 'Masculino' ? 'selected' : '' }}>
            Masculino</option>
        <option value="Femenino" {{ old('genero', $paciente->genero ?? '') == 'Femenino' ? 'selected' : '' }}>Femenino
        </option>
        <option value="Otro" {{ old('genero', $paciente->genero ?? '') == 'Otro' ? 'selected' : '' }}>Otro</option>
    </select>
    @error('genero')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="telefono_principal" class="form-label">Teléfono principal</label>
    <input type="text" name="telefono_principal" id="telefono_principal"
        class="form-control @error('telefono_principal') is-invalid @enderror"
        value="{{ old('telefono_principal', $paciente->telefono_principal ?? '') }}" placeholder="Teléfono principal"
        required>
    @error('telefono_principal')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="telefono_emergencia" class="form-label">Teléfono de emergencia</label>
    <input type="text" name="telefono_emergencia" id="telefono_emergencia"
        class="form-control @error('telefono_emergencia') is-invalid @enderror"
        value="{{ old('telefono_emergencia', $paciente->telefono_emergencia ?? '') }}"
        placeholder="Teléfono de emergencia">
    @error('telefono_emergencia')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="correo" class="form-label">Correo electrónico</label>
    <input type="email" name="correo" id="correo" class="form-control @error('correo') is-invalid @enderror"
        value="{{ old('correo', $paciente->correo ?? '') }}" placeholder="Correo electrónico" required>
    @error('correo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="direccion" class="form-label">Dirección</label>
    <textarea name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror"
        placeholder="Dirección">{{ old('direccion', $paciente->direccion ?? '') }}</textarea>
    @error('direccion')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="alergias" class="form-label">Alergias</label>
    <textarea name="alergias" id="alergias" class="form-control @error('alergias') is-invalid @enderror"
        placeholder="Alergias conocidas">{{ old('alergias', $paciente->alergias ?? '') }}</textarea>
    @error('alergias')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="medicamentos" class="form-label">Medicamentos</label>
    <textarea name="medicamentos" id="medicamentos" class="form-control @error('medicamentos') is-invalid @enderror"
        placeholder="Medicamentos actuales">{{ old('medicamentos', $paciente->medicamentos ?? '') }}</textarea>
    @error('medicamentos')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="historial_cirugias" class="form-label">Historial de cirugías</label>
    <textarea name="historial_cirugias" id="historial_cirugias"
        class="form-control @error('historial_cirugias') is-invalid @enderror" placeholder="Historial de cirugías">{{ old('historial_cirugias', $paciente->historial_cirugias ?? '') }}</textarea>
    @error('historial_cirugias')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
