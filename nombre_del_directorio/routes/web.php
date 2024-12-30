<?php

use App\Models\Producto;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Mostrar todos los productos
Route::get('/productos', function () {
    $productos = Producto::all();
    return view('productos.index', compact('productos'));
})->name('productos.index');

// Ruta principal que redirige a 'indexReal'
Route::get('/', function () {
    return redirect()->route('indexReal');  // Redirige a la vista 'indexReal'
});

// Ruta para la vista indexReal
Route::get('/indexReal', function () {
    return view('indexReal');  // Redirige a la vista 'indexReal.blade.php'
})->name('indexReal');

// Mostrar formulario para agregar un producto
Route::get('/productos/create', function () {
    return view('productos.create');
})->name('productos.create');

// Guardar un nuevo producto
Route::post('/productos', function (Request $request) {
    Producto::create($request->all());
    return redirect()->route('productos.index');
})->name('productos.store');

// Eliminar un producto
Route::delete('/productos/{id}', function ($id) {
    Producto::findOrFail($id)->delete();
    return redirect()->route('productos.index');
})->name('productos.destroy');


