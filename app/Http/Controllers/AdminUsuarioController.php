<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUsuarioController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $usuario)
    {
        return view('admin.users.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required|in:user,admin'
        ]);

        // Forzar la actualización del rol
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->role = $request->role;
        $usuario->save();

        return redirect()->route('admin.usuarios')->with('success', 'Usuario actualizado');
    }


    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('admin.usuarios')->with('success', 'Usuario eliminado');
    }
}
