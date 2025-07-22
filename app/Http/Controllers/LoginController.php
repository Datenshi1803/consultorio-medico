<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();

            // Guardamos el nombre en sesión
            $request->session()->put('usuario_nombre', $user->name);

            // Redirección según el rol
            switch ($user->rol) {
                case 'paciente':
                    return redirect()->route('paciente.inicio'); // '/inicio-paciente'
                case 'medico':
                    return redirect()->route('medico.inicio'); // '/inicio-medico'
                case 'administrador':
                    return redirect()->route('admin.inicio'); // '/inicio-admin'
                default:
                    return redirect('/');
            }
        }

        return back()->with('error', 'Credenciales inválidas');
    }
}
