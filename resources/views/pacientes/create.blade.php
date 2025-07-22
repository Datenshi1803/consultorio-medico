@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Paciente</h2>
    <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf
        @include('pacientes.form')
        <button type="submit">Guardar</button>
    </form>
</div>
@endsection
