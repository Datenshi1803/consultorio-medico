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

            switch ($user->rol) {
                case 'paciente':
                    return redirect('/inicio-paciente');
                case 'medico':
                    return redirect('/inicio-medico');
                case 'administrador':
                    return redirect('/inicio-admin');
                default:
                    return redirect('/');
            }
        }

        return back()->with('error', 'Credenciales inválidas');
    }
}
