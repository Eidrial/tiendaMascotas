<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        // validacion de los datos
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'], //email unico y valido
            /*'password' => ['required', 'confirmed', Rules\Password::defaults()],*/ //reglas de seguridad predetermnindas por laravel, por comodidad lo he quitado y puesto algo más simple 
            'password' => ['required', 'confirmed', 'min:4'], //para hacerlo mas flexible
        ]);

        // crear usuario en la case de datos
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), //para encriptar la contra antes de guardarla
            'role' => 'user', // para que los usuarios creados desde el login siempre tengan el rol user
        ]);

        return back()->with('success', 'Registro exitoso.'); // se usa back() para volver a la misma página sin cambiar de vista y mostrar el popup
    }
}
