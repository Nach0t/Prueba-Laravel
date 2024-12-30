use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

// Mostrar todos los productos
Route::get('/productos', function () {
    return Producto::all();  // Devuelve todos los productos en formato JSON
});

// Mostrar un solo producto
Route::get('/productos/{id}', function ($id) {
    $producto = Producto::find($id);

    if (!$producto) {
        return response()->json(['message' => 'Producto no encontrado'], 404);  // Si no existe el producto, respuesta 404
    }

    return response()->json($producto);  // Devuelve el producto encontrado en formato JSON
});

// Crear un nuevo producto
Route::post('/productos', function (Request $request) {
    // Validación de datos
    $validator = Validator::make($request->all(), [
        'nombre' => 'required|string|max:100',
        'descripcion' => 'nullable|string|max:255',
        'precio' => 'required|numeric|min:0',
        'cantidad' => 'required|integer|min:0',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);  // Respuesta con los errores de validación
    }

    // Crear el producto si los datos son válidos
    $producto = Producto::create($request->all());

    return response()->json($producto, 201);  // Responde con el producto creado y código 201 (Creado)
});

// Actualizar un producto
Route::put('/productos/{id}', function (Request $request, $id) {
    $producto = Producto::find($id);

    if (!$producto) {
        return response()->json(['message' => 'Producto no encontrado'], 404);  // Producto no encontrado
    }

    // Validación de datos
    $validator = Validator::make($request->all(), [
        'nombre' => 'required|string|max:100',
        'descripcion' => 'nullable|string|max:255',
        'precio' => 'required|numeric|min:0',
        'cantidad' => 'required|integer|min:0',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);  // Respuesta con los errores de validación
    }

    // Actualizar el producto con los nuevos datos
    $producto->update($request->all());

    return response()->json($producto);  // Responde con el producto actualizado
});

// Eliminar un producto
Route::delete('/productos/{id}', function ($id) {
    $producto = Producto::find($id);

    if (!$producto) {
        return response()->json(['message' => 'Producto no encontrado'], 404);  // Producto no encontrado
    }

    $producto->delete();

    return response()->json(null, 204);  // Respuesta vacía con código 204 (No content) indicando eliminación exitosa
});
