<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CompraController extends Controller
{
    public function comprar(Producto $producto)
    {
        if ($producto->stock > 0) {
            $producto->stock -= 1;
            $producto->save();
            return back()->with('success', 'Compra realizada con éxito.');
        }
        return back()->with('error', 'Producto sin stock.');
    }
}
