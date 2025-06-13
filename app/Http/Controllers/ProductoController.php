<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::paginate(6); // 6 por página
        return view('user.admin', compact('productos')); // envia los datos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create'); // crea la vista para añadir productos
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validacion de los datos del producto
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // la imagen opcional, solo formatos permitidos y hasta 2MB
        ]);

        // pbtiene los datos relevantes para la base de datos
        $data = $request->only(['nombre', 'descripcion', 'precio', 'stock']);

        // si hay una imagen la guarda en storage
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreArchivo = $file->getClientOriginalName(); // obtiene el nombre original del archivo

            // guarda la imagen en storage/app/public/productos con el nombre original
            $file->storeAs('public/productos', $nombreArchivo);

            $data['imagen'] = $nombreArchivo; // guarda el nombre de la imagen en la base de datos
        }

        // crea el producto en la base de datos
        Producto::create($data);

        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto')); // muestra los detalles de un producto
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto')); // carga la vista de edición
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        // validacion de los datos del producto
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // obtiene los datos relevantes para la base de datos
        $data = $request->only(['nombre', 'descripcion', 'precio', 'stock']);

        // si se sube una nueva imagen, reemplaza la anterior
        if ($request->hasFile('imagen')) {
            // guarda el nombre de la imagen anterior antes de borrarla
            $imagenAnterior = $producto->imagen;

            // elimina la imagen anterior si existe
            if ($imagenAnterior) {
                Storage::delete('productos/' . $imagenAnterior);
            }
            $file = $request->file('imagen');
            $nombreArchivo = $file->getClientOriginalName();
            $file->storeAs('productos', $nombreArchivo, 'public');

            $data['imagen'] = $nombreArchivo;
        }

        // actualiza el producto en la base de datos
        $producto->update($data);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete(); // borra el producto

        return redirect()->route('user.admin')->with('success', 'Producto eliminado correctamente.');
    }

    // muestra una página de confirmacion antes de eliminar un producto
    public function confirmar(Producto $producto)
    {
        return view('productos.confirmar-eliminacion', compact('producto'));
    }

    public function vistaUsuario()
    {
        $productos = Producto::paginate(6); // 6 por página
        return view('user.user', compact('productos'));
    }
}
