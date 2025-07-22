<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function inicio()
{
    $user = auth()->user();

    $doctor = $user->medico;

    if (!$doctor) {
        return back()->with('error', 'No se encontró perfil médico asociado.');
    }

    return view('doctor.inicio', compact('doctor'));
}

}