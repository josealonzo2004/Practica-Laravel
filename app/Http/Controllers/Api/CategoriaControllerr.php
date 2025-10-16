<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
//responsa, añadelo aqui


class CategoriaControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //consultar todos los registro que existen en la tabla de categorias
        return Categoria::query()
        ->withCount('productos')
        ->orderBy('id','desc')
        ->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar la data que no esnvia el cliente
        $data = $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre',
            'descripcion' => 'nullable|string',
            'activa' => 'boolean',
        ]);

        //agregar o crear el registro como tal en la base de datos
        $categoria = Categoria::create($data);

        //devolver una respuesta al cliente
        return response()->json($categoria);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
        return $categoria->load('productos');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
        $data = $request->validate([
            'nombre'=>'sometimes|required|string|max:255|unique:categorias,nombre,'.$categoria->id,
            'descripcion'=>'nullable|string',
            'activa'=>'boolean',
        ]);

        $categoria->update($data);

        return response()->json($categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
        $categoria->delete();
        return response()->json(['message'=>'Categoria eliminada correctamente'], 200);
    }
}