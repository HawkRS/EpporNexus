<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ferreteria;

class FerreteriaController extends Controller
{
    private $f = 'nexus.inventarios.ferreteria.';
    /**
     * Muestra una lista de todos los artículos de ferretería.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articulos = Ferreteria::orderBy('nombre')->get();
        //dd($articulos);
        return view($this->f.'index', compact('articulos'));
    }

    /**
     * Muestra el formulario para crear un nuevo artículo.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // En un entorno real, las categorías se cargarían de una tabla de configuración.
        $categorias = ['Seguridad', 'Abrasivos', 'Soldadura', 'Herramienta', 'Limpieza', 'Otro'];
        return view($this->f.'create', compact('categorias'));
    }

    /**
     * Almacena un artículo recién creado en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => ['required', 'string', 'max:150', 'unique:ferreteria,nombre'],
            'categoria' => ['required', 'string', 'max:50'],
            'cantidad' => ['required', 'integer', 'min:0'],
            'costo_unitario' => ['required', 'numeric', 'min:0.01'],
            'unidad_medida' => ['required', 'string', 'max:30'],
            'precio_venta' => ['nullable', 'numeric', 'min:0'],
        ]);

        Ferreteria::create($validatedData);

        return redirect()->route('ferreteria.index')
                         ->with('success', 'Artículo de ferretería creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un artículo existente.
     *
     * @param  \App\Models\Ferreteria  $articulo
     * @return \Illuminate\View\View
     */
    public function edit(Ferreteria $articulo)
    {
        $categorias = ['Seguridad', 'Abrasivos', 'Soldadura', 'Herramienta', 'Limpieza', 'Otro'];
        return view('ferreteria.edit', compact('articulo', 'categorias'));
    }

    /**
     * Actualiza un artículo existente en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ferreteria  $articulo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Ferreteria $articulo)
    {
        $validatedData = $request->validate([
            'nombre' => ['required', 'string', 'max:150', Rule::unique('ferreteria')->ignore($articulo->id)],
            'categoria' => ['required', 'string', 'max:50'],
            'cantidad' => ['required', 'integer', 'min:0'],
            'costo_unitario' => ['required', 'numeric', 'min:0.01'],
            'unidad_medida' => ['required', 'string', 'max:30'],
            'precio_venta' => ['nullable', 'numeric', 'min:0'],
        ]);

        $articulo->update($validatedData);

        return redirect()->route('ferreteria.index')
                         ->with('success', 'Artículo de ferretería actualizado exitosamente.');
    }

    /**
     * Elimina un artículo (Soft Delete) de la base de datos.
     *
     * @param  \App\Models\Ferreteria  $articulo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Ferreteria $articulo)
    {
        $articulo->delete(); // Usa Soft Deletes

        return redirect()->route('ferreteria.index')
                         ->with('success', 'Artículo eliminado de inventario.');
    }

    /**
 * Obtiene y devuelve todo el inventario agrupado por categoría.
 * En producción, aquí se haría una consulta a la DB (e.g., Eloquent).
 */
  public function getInventory(Request $request)
  {

    $articulos = Ferreteria::orderBy('nombre')->get();

    return response()->json($articulos);
    }

    /**
     * Maneja las peticiones PUT para actualizar productos.
     */
    public function updateItem(Request $request, $id)
    {
        // Lógica para encontrar el Item::find($id) y actualizarlo con $request->all()
        Log::info("Actualización recibida para el producto ID: {$id}", $request->all());

        // Devolver una respuesta de éxito con los datos actualizados
        return response()->json([
            'message' => 'Producto actualizado exitosamente.',
            'updated_id' => $id,
            // Aquí podrías devolver los datos del producto actualizado desde la DB
        ]);
    }

    /**
     * Maneja las peticiones DELETE para eliminar productos.
     */
    public function deleteItem($id)
    {
        // Lógica para Item::destroy($id)
        Log::info("Petición de eliminación para el producto ID: {$id}");

        // Devolver una respuesta de éxito
        return response()->json([
            'message' => 'Producto eliminado exitosamente.',
            'deleted_id' => $id
        ]);
    }
}
