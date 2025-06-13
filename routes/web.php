<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\AdminUsuarioController;

// carga las rutas de autenticacion (login, registro y logout)
require __DIR__ . '/auth.php';

Route::view('/', 'home')->name('home');

/* PARA REGISTROS
get register: muestra el formulario de registro
post register`: procesa datos y guarda el usuario en la base de datos */
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

/* PARA LOGIN
get login: muestra el formulario de inicio de sesion
post login: rrocesa el login */
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

/* PARA LOGOUT
solo usuarios autenticados pueden cerrarla porque la ruta esta protegida con AuthenticatedSessionController */
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

/* COMPROBACION DE ROL DE USUARIO PARA REDIRIGIR
middleware(['auth']) garantiza que solo usuarios autenticados puedan acceder a estas paginas */
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [ProductoController::class, 'index'])->name('user.admin'); // Pagina de admin
    Route::get('/user/user', [ProductoController::class, 'vistaUsuario'])->name('user.user'); // Pagina de usuario normal
});

// Rutas CRUD para productos
Route::resource('productos', ProductoController::class);

Route::get('/productos/{producto}/confirmar', [ProductoController::class, 'confirmar'])->name('productos.confirmar');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

//Ruta compra básica
Route::post('/comprar/{producto}', [CompraController::class, 'comprar'])->name('productos.comprar');

/* RUTA ADMINISTRAR USUARIOS
Solo los administradores pueden acceder a estas funciones */
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/usuarios', [AdminUsuarioController::class, 'index'])->name('admin.usuarios');
    Route::get('/admin/usuarios/{usuario}/edit', [AdminUsuarioController::class, 'edit'])->name('admin.usuarios.edit');
    Route::put('/admin/usuarios/{usuario}', [AdminUsuarioController::class, 'update'])->name('admin.usuarios.update');
    Route::delete('/admin/usuarios/{usuario}', [AdminUsuarioController::class, 'destroy'])->name('admin.usuarios.destroy');
});