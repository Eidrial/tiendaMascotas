<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        // validacion de los datos de inicio de sesion
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // intenta autenticar al usuario con los datos proporcionados
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors(['email' => 'Credenciales incorrectas']); // si falla, muestra un error
        }

        $user = Auth::user(); // obtiene al usuario

        // redirige segun el rol del usuario
        if ($user->role == 'admin') {
            return redirect()->route('user.admin'); // ruta para usuarios admin
        } else {
            return redirect()->route('user.user'); // ruta para usuarios normales
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout(); // cierra la sesión del usuario

        $request->session()->invalidate(); // borra los datos de sesión

        $request->session()->regenerateToken(); // genera un nuevo token de sesion

        return redirect('/'); // redirige a la pagina de inicio
    }
}
